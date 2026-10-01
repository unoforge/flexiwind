<?php

/**
 * Convertisseur Blade -> Markdown.
 *
 * Outil de migration à usage unique : une fois le contenu passé en Markdown
 * et les anciennes vues supprimées, ce fichier n'a plus de raison d'exister.
 *
 *   php bin/import-docs.php [--dry]
 */

$root = dirname(__DIR__);
$repo = dirname(dirname($root));
$dry = in_array('--dry', $argv, true);
$force = in_array('--force', $argv, true);

$sources = [
    [
        'name' => 'site (free)',
        'content' => $repo.'/site/resources/views/content',
        'sidebar' => $repo.'/site/config/sidebar.php',
        'docsCode' => $repo.'/site/app/Support/DocsCode',
        'tier' => 'free',
        'priority' => 0,
        'remap' => [
            // Page présente dans le contenu mais absente de config/sidebar.php :
            // orpheline, atteignable par URL mais jamais listée. La migration
            // l'a fait apparaître, on lui donne sa place.
            'components/field' => [
                'group' => 'Actions & Inputs',
                'order' => 35,
                'description' => 'Form field wrapper with label, hint, error message and required indicator.',
                'seoDescription' => 'Compose accessible Laravel forms with the Flexiwind field wrapper.',
                'keywords' => 'field, form, label, validation, error message',
            ],
        ],
        'skip' => [],
    ],
    [
        'name' => 'club (pro)',
        'content' => $repo.'/workspace/flexiwind-pro/resources/views/content',
        'sidebar' => $repo.'/workspace/flexiwind-pro/config/sidebar.php',
        'docsCode' => $repo.'/workspace/flexiwind-pro/app/Support/DocsCode',
        'tier' => 'pro',
        'priority' => 1,
        'remap' => [],
        // Le free couvre déjà ces pages. Le setup Club n'est pas une section
        // à part : il vit dans /docs/installation, écrit à la main.
        'skip' => ['components', 'docs/introduction', 'docs/installation'],
    ],
];

// ---------------------------------------------------------------- tokenizer

final class BladeParser
{
    private int $i = 0;

    public function __construct(private readonly string $src) {}

    /** @return array<int, array<string, mixed>> */
    public function parse(?string $stop = null): array
    {
        $nodes = [];
        $text = '';
        $length = strlen($this->src);

        while ($this->i < $length) {
            $char = $this->src[$this->i];

            if ($char === '<') {
                if ($stop !== null && str_starts_with(substr($this->src, $this->i), '</'.$stop)) {
                    $this->i = strpos($this->src, '>', $this->i) + 1;
                    break;
                }

                if (preg_match('/\G<(x-[\w.:-]+|livewire:[\w.:-]+)/', $this->src, $m, 0, $this->i)) {
                    if (trim($text) !== '') {
                        $nodes[] = ['type' => 'text', 'value' => $text];
                    }
                    $text = '';
                    $nodes[] = $this->parseTag($m[1]);

                    continue;
                }
            }

            $text .= $char;
            $this->i++;
        }

        if (trim($text) !== '') {
            $nodes[] = ['type' => 'text', 'value' => $text];
        }

        return $nodes;
    }

    /** @return array<string, mixed> */
    private function parseTag(string $name): array
    {
        $start = $this->i;
        $this->i += strlen($name) + 1;

        $attributes = [];
        $selfClosing = false;
        $length = strlen($this->src);

        while ($this->i < $length) {
            while ($this->i < $length && ctype_space($this->src[$this->i])) {
                $this->i++;
            }

            if ($this->src[$this->i] === '/' && ($this->src[$this->i + 1] ?? '') === '>') {
                $selfClosing = true;
                $this->i += 2;
                break;
            }

            if ($this->src[$this->i] === '>') {
                $this->i++;
                break;
            }

            if (! preg_match('/\G([:@\w.-]+)/', $this->src, $m, 0, $this->i)) {
                $this->i++;

                continue;
            }

            $attribute = $m[1];
            $this->i += strlen($attribute);
            $value = true;

            if (($this->src[$this->i] ?? '') === '=') {
                $this->i++;
                $quote = $this->src[$this->i] ?? '"';

                if ($quote === '"' || $quote === "'") {
                    // La quote fermante peut être échappée :
                    //   code='…$errors->first(\'email\')…'
                    // S'arrêter au premier guillemet coupait la page en deux.
                    $end = $this->i + 1;
                    $length = strlen($this->src);

                    while ($end < $length) {
                        if ($this->src[$end] === '\\') { $end += 2; continue; }
                        if ($this->src[$end] === $quote) { break; }
                        $end++;
                    }

                    $value = substr($this->src, $this->i + 1, $end - $this->i - 1);
                    $value = str_replace(['\\'.$quote, '\\\\'], [$quote, '\\'], $value);
                    $this->i = $end + 1;
                }
            }

            $attributes[$attribute] = $value;
        }

        $children = $selfClosing ? [] : (new self(substr($this->src, $this->i)))->parseInto($name, $this->i, $this);

        return [
            'type' => 'tag',
            'name' => $name,
            'attrs' => $attributes,
            'children' => $children,
            'raw' => substr($this->src, $start, $this->i - $start),
        ];
    }

    /** Parse les enfants dans le flux du parent, puis avance son curseur. */
    private function parseInto(string $stop, int $offset, self $parent): array
    {
        $this->i = 0;
        $nodes = $this->parse($stop);
        $parent->i = $offset + $this->i;

        return $nodes;
    }
}

// ----------------------------------------------------------------- renderer

final class MarkdownRenderer
{
    public array $unknown = [];

    public function __construct(private readonly array $docsCode) {}

    public function blocks(array $nodes): string
    {
        $out = [];
        $run = [];

        // Les nœuds inline consécutifs forment UN paragraphe. Sans ce
        // regroupement, « … notre bibliothèque <lien/>. Installez-la … »
        // se découpe en trois blocs et la phrase est cassée.
        $flush = function () use (&$run, &$out): void {
            if ($run === []) {
                return;
            }

            $text = $this->inline($run);
            $run = [];

            if (trim($text) !== '') {
                $out[] = $text;
            }
        };

        foreach ($nodes as $node) {
            if ($node['type'] === 'text' || $this->inlineNode($node) !== null) {
                $run[] = $node;

                continue;
            }

            $flush();
            $block = $this->block($node);

            if (trim($block) !== '') {
                $out[] = trim($block, "\n");
            }
        }

        $flush();

        return implode("\n\n", $out);
    }

    private function block(array $node): string
    {
        if ($node['type'] === 'text') {
            $text = $this->text($node['value']);

            return trim($text) === '' ? '' : $text;
        }

        // Un élément inline seul au niveau bloc reste un paragraphe.
        $asInline = $this->inlineNode($node);

        if ($asInline !== null) {
            return $asInline;
        }

        $name = $node['name'];
        $attrs = $node['attrs'];

        return match (true) {
            $name === 'x-md.h2' => '## '.$this->inline($node['children']),
            $name === 'x-md.h3' => '### '.$this->inline($node['children']),
            $name === 'x-md.h4' => '#### '.$this->inline($node['children']),
            $name === 'x-md.paragraph' => $this->inline($node['children']),
            $name === 'x-md.ul' => $this->list($node['children'], '- '),
            $name === 'x-md.ol' => $this->list($node['children'], '1. '),
            $name === 'x-md.li' => '- '.$this->inline($node['children']),
            $name === 'x-docs.table' => $this->table($node),
            $name === 'x-docs.steps' => $this->container('steps', [], $this->blocks($node['children'])),
            $name === 'x-docs.step' => $this->container('step', [], $this->blocks($node['children'])),
            $name === 'x-docs.callout' => $this->container('callout', ['type' => $attrs['type'] ?? 'note'], $this->blocks($node['children'])),
            $name === 'x-md.references-grid' => $this->container('references', [], $this->blocks($node['children'])),
            $name === 'x-md.reference' => $this->leaf('reference', [
                'href' => $attrs['href'] ?? '',
                'title' => $attrs['title'] ?? '',
                'description' => $attrs['description'] ?? '',
            ]),
            $name === 'x-docs.component-prev' => $this->container('preview-box', [], $this->blocks($node['children'])),
            $name === 'livewire:base.component-tab-preview-code',
            $name === 'x-base.component-tab-preview-code' => $this->preview($attrs),
            $name === 'livewire:base.terminal', $name === 'x-base.terminal' => $this->fence('bash', $this->literal($attrs)),
            $name === 'livewire:base.load-code', $name === 'x-base.load-code' => $this->loadCode($attrs),
            default => $this->raw($node),
        };
    }

    // ------------------------------------------------------------- éléments

    private function preview(array $attrs): string
    {
        $component = (string) ($attrs['component'] ?? '');
        $segments = explode('.', $component);

        // components.examples.button.demo / components.demo.select.default -> button/demo
        if (($segments[0] ?? '') === 'components' && in_array($segments[1] ?? '', ['examples', 'demo'], true)) {
            $segments = array_slice($segments, 2);
        }

        $attributes = ['example' => implode('/', $segments)];

        if (isset($attrs['no-in-tabs']) || isset($attrs['noInTabs'])) {
            $attributes['inline'] = true;
        }

        return $this->leaf('preview', $attributes);
    }

    /**
     * `code="…"` ou `:code="'…'"` — la seconde forme est un littéral PHP.
     * Ne lire que la première laissait onze terminaux vides.
     *
     * @param array<string, mixed> $attrs
     */
    private function literal(array $attrs): string
    {
        $value = $attrs['code'] ?? null;

        if (is_string($value)) {
            return $value;
        }

        $bound = $attrs[':code'] ?? null;

        if (! is_string($bound)) {
            return '';
        }

        $bound = trim($bound);

        foreach (["'", '"'] as $quote) {
            if (str_starts_with($bound, $quote) && str_ends_with($bound, $quote)) {
                return str_replace(['\\'.$quote, '\\\\'], [$quote, '\\'], substr($bound, 1, -1));
            }
        }

        // Expression PHP non évaluable : on ne devine pas.
        return '';
    }

    private function loadCode(array $attrs): string
    {
        $raw = (string) ($attrs[':name'] ?? $attrs['name'] ?? '');
        preg_match_all("/'([^']+)'/", $raw, $matches);
        $names = $matches[1] ?: array_filter([trim($raw, "[]' ")]);

        $blocks = [];

        foreach ($names as $key) {
            $snippet = $this->docsCode[$key] ?? null;

            if ($snippet === null) {
                $this->unknown[] = 'snippet:'.$key;

                continue;
            }

            $blocks[] = $this->fence(
                (string) ($snippet['lang'] ?? 'text'),
                (string) ($snippet['code'] ?? ''),
                (string) ($snippet['name'] ?? ''),
                $snippet['lines'] ?? []
            );
        }

        if ($blocks === []) {
            return '';
        }

        return count($blocks) === 1 ? $blocks[0] : $this->container('tabs', [], implode("\n\n", $blocks));
    }

    private function fence(string $lang, string $code, string $title = '', array $lines = []): string
    {
        $info = $lang;

        if ($title !== '') {
            $info .= ' title="'.$title.'"';
        }

        if ($lines !== []) {
            $pairs = [];

            foreach ($lines as $line => $class) {
                $pairs[] = $line.':'.$class;
            }

            $info .= ' lines="'.implode(',', $pairs).'"';
        }

        $ticks = str_repeat('`', max(3, $this->longestRun($code, '`') + 1));

        return $ticks.$info."\n".rtrim($code)."\n".$ticks;
    }

    /**
     * Les listes de la doc contiennent souvent autre chose que des <li> :
     * un paragraphe et un bloc de code entre deux points d'une procédure.
     * Ne garder que les <li> faisait disparaître tout le reste — c'est ce qui
     * vidait la section « Usage » de dix pages.
     */
    private function list(array $children, string $bullet): string
    {
        $items = array_values(array_filter($children, fn (array $c): bool => ($c['name'] ?? '') === 'x-md.li'));
        $others = array_values(array_filter($children, fn (array $c): bool => ($c['name'] ?? '') !== 'x-md.li' && ($c['type'] !== 'text' || trim($c['value'] ?? '') !== '')));

        // Liste homogène : du Markdown standard.
        if ($others === []) {
            return implode("\n", array_map(
                fn (array $c): string => $bullet.str_replace("\n", "\n  ", $this->inline($c['children'])),
                $items
            ));
        }

        // Liste hétérogène : on aplatit, sinon les fences et les directives
        // se retrouveraient indentées et cesseraient d'être reconnues.
        $out = [];
        $index = 0;

        foreach ($children as $child) {
            if (($child['name'] ?? '') === 'x-md.li') {
                $index++;
                $marker = $bullet === '- ' ? '-' : $index.'\\.';
                $out[] = $marker.' '.$this->inline($child['children']);

                continue;
            }

            $block = $this->block($child);

            if (trim($block) !== '') {
                $out[] = trim($block, "\n");
            }
        }

        return implode("\n\n", $out);
    }

    private function table(array $node): string
    {
        $columns = ['Prop', 'Description'];

        if (preg_match_all("/'label'\s*=>\s*'([^']*)'/", (string) ($node['attrs'][':columns'] ?? ''), $m)) {
            $columns = $m[1];
        }

        $rows = [];

        foreach ($this->find($node['children'], 'x-ui.table.row') as $row) {
            $cells = [];

            foreach ($this->find($row['children'], 'x-ui.table.cell') as $cell) {
                $cells[] = str_replace(['|', "\n"], ['\|', ' '], $this->inline($cell['children']));
            }

            if ($cells !== []) {
                $rows[] = '| '.implode(' | ', $cells).' |';
            }
        }

        if ($rows === []) {
            return '';
        }

        $count = max(count($columns), 2);
        $columns = array_pad(array_slice($columns, 0, $count), $count, '');

        return '| '.implode(' | ', $columns)." |\n| ".implode(' | ', array_fill(0, $count, '---'))." |\n".implode("\n", $rows);
    }

    /**
     * Les deux docs-kits ont divergé : côté free, terminal & co sont des
     * composants Livewire ; côté pro, des composants Blade anonymes. Dans un
     * bloc brut on normalise vers la forme du site hôte.
     */
    private const COMPAT = [
        '<livewire:base.' => '<x-base.',
        '</livewire:base.' => '</x-base.',
    ];

    private function raw(array $node): string
    {
        $this->unknown[] = $node['name'];

        return $this->container('raw', [], rtrim(strtr($node['raw'], self::COMPAT)));
    }

    // ------------------------------------------------------------- inline

    private function inline(array $nodes): string
    {
        $out = '';

        foreach ($nodes as $node) {
            if ($node['type'] === 'text') {
                $out .= $this->text($node['value']);

                continue;
            }

            $inline = $this->inlineNode($node);
            $out .= $inline ?? "\n\n".$this->block($node)."\n\n";
        }

        return trim(preg_replace('/[ \t]+/', ' ', $out) ?? $out);
    }

    /** Rend un nœud inline, ou null s'il n'en est pas un. */
    private function inlineNode(array $node): ?string
    {
        if ($node['type'] !== 'tag') {
            return null;
        }

        $attrs = $node['attrs'];

        return match ($node['name']) {
            'x-docs.inline-code' => '`'.trim((string) ($attrs['text'] ?? $this->inline($node['children']))).'`',
            'x-docs.link', 'x-docs.doc-link', 'x-ui.link'
                => '['.trim($this->inline($node['children'])).']('.($attrs['href'] ?? '#').')',
            'x-docs.table-description' => $this->inline($node['children']),
            'x-ui.icon' => '',
            default => null,
        };
    }

    /** HTML inline brut -> Markdown. Les espaces de bord sont préservés :
     *  sans ça, `the <x-docs.link>…</x-docs.link> page` devient `the[…]page`. */
    private function text(string $text): string
    {
        $leading = preg_match('/^\s/', $text) === 1 ? ' ' : '';
        $trailing = preg_match('/\s$/', $text) === 1 ? ' ' : '';

        $emphasis = static function (string $marker): callable {
            // <strong>\n texte \n</strong> doit donner **texte**, pas **\ntexte\n** :
            // Markdown n'interprète pas un marqueur détaché de son texte.
            return static function (array $m) use ($marker): string {
                $inner = trim($m[count($m) - 1]);

                return $inner === '' ? '' : $marker.$inner.$marker;
            };
        };

        $text = preg_replace_callback('#<(strong|b)>(.*?)</\1>#s', $emphasis('**'), $text) ?? $text;
        $text = preg_replace_callback('#<(em|i)>(.*?)</\1>#s', $emphasis('*'), $text) ?? $text;
        $text = preg_replace_callback('#<code>(.*?)</code>#s', $emphasis('`'), $text) ?? $text;
        $text = preg_replace('#<a\s[^>]*href="([^"]*)"[^>]*>(.*?)</a>#s', '[$2]($1)', $text) ?? $text;
        $text = preg_replace('#<br\s*/?>#', "\n", $text) ?? $text;
        $text = strip_tags($text);
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');

        $text = preg_replace('/[ \t]*\n[ \t]*/', "\n", trim($text)) ?? $text;

        return $text === '' ? ($leading ?: $trailing) : $leading.$text.$trailing;
    }

    // ------------------------------------------------------------- helpers

    /** Le conteneur parent prend toujours un deux-points de plus que ses enfants. */
    private function container(string $name, array $attrs, string $inner): string
    {
        $colons = str_repeat(':', max(3, $this->longestRun($inner, ':') + 1));

        return $colons.$name.$this->attrs($attrs)."\n".trim($inner, "\n")."\n".$colons;
    }

    private function leaf(string $name, array $attrs): string
    {
        return '::'.$name.$this->attrs($attrs);
    }

    private function attrs(array $attrs): string
    {
        $parts = [];

        foreach ($attrs as $key => $value) {
            if ($value === true) {
                $parts[] = $key;

                continue;
            }

            if ((string) $value === '') {
                continue;
            }

            $parts[] = $key.'="'.str_replace('"', "'", (string) $value).'"';
        }

        return $parts === [] ? '' : '{'.implode(' ', $parts).'}';
    }

    private function longestRun(string $text, string $char): int
    {
        preg_match_all('/^'.preg_quote($char, '/').'+/m', $text, $m);

        return max(0, ...array_map('strlen', $m[0] ?: ['']));
    }

    private function find(array $nodes, string $name): array
    {
        $found = [];

        foreach ($nodes as $node) {
            if (($node['name'] ?? '') === $name) {
                $found[] = $node;

                continue;
            }

            if (! empty($node['children'])) {
                $found = [...$found, ...$this->find($node['children'], $name)];
            }
        }

        return $found;
    }
}

// --------------------------------------------------------------- migration

function loadDocsCode(string $path): array
{
    if (! is_dir($path)) {
        return [];
    }

    $all = [];
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS));

    foreach ($iterator as $file) {
        if ($file->getExtension() !== 'php') {
            continue;
        }

        $data = require $file->getRealPath();

        if (is_array($data)) {
            $all = array_merge($all, $data);
        }
    }

    return $all;
}

function frontMatter(array $meta): string
{
    $lines = ['---'];

    foreach ($meta as $key => $value) {
        if ($value === null || $value === '') {
            continue;
        }

        if (is_bool($value)) {
            $lines[] = $key.': '.($value ? 'true' : 'false');

            continue;
        }

        $lines[] = is_int($value) ? $key.': '.$value : $key.': "'.str_replace('"', "'", (string) $value).'"';
    }

    $lines[] = '---';

    return implode("\n", $lines);
}

$out = $root.'/content';
$written = 0;
$unknown = [];
$report = [];

foreach ($sources as $source) {
    $sidebar = require $source['sidebar'];
    $docsCode = loadDocsCode($source['docsCode']);

    // path d'URL -> métadonnées de navigation
    $nav = [];

    foreach ($sidebar as $group) {
        $order = 0;

        foreach ($group['items'] ?? [] as $item) {
            $nav[$item['path']] = $item + ['group' => $group['label'], 'order' => ($order += 10)];
        }
    }

    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source['content'], FilesystemIterator::SKIP_DOTS));

    foreach ($files as $file) {
        if (! str_ends_with($file->getFilename(), '.blade.php')) {
            continue;
        }

        $slug = trim(str_replace('.blade.php', '', substr($file->getPathname(), strlen($source['content']) + 1)), '/');

        if (in_array($slug, $source['skip'], true)) {
            $report[] = ['-', $source['name'], $slug, 'ignoré (déjà couvert par le free)'];

            continue;
        }

        $remap = $source['remap'][$slug] ?? [];
        $target = $remap['slug'] ?? $slug;
        $item = $nav['/'.$slug] ?? [];

        $body = file_get_contents($file->getPathname());

        // Les blocs @php sont du code, pas du contenu : on les sort d'abord et
        // on les réinjecte tels quels en tête de page.
        $preamble = '';

        if (preg_match_all('/@php\b.*?@endphp/s', $body, $m)) {
            $preamble = implode("\n", $m[0]);
            $body = preg_replace('/@php\b.*?@endphp/s', '', $body) ?? $body;
        }

        // On ne garde que l'intérieur du wrapper de page.
        if (preg_match('#<x-layouts\.doc-page-wrapper[^>]*>(.*)</x-layouts\.doc-page-wrapper>#s', $body, $m)) {
            $body = $m[1];
        }

        $renderer = new MarkdownRenderer($docsCode);
        $markdown = $renderer->blocks((new BladeParser($body))->parse());

        if (trim($preamble) !== '') {
            $markdown = ":::raw\n".trim($preamble)."\n:::\n\n".$markdown;
        }

        $meta = [
            'title' => $remap['title'] ?? ($item['title'] ?? ucwords(str_replace('-', ' ', basename($target)))),
            'group' => $remap['group'] ?? ($item['group'] ?? 'Documentation'),
            'order' => $remap['order'] ?? ($item['order'] ?? 100),
            'tier' => $source['tier'],
            'description' => $remap['description'] ?? ($item['description'] ?? ''),
            'seoDescription' => $remap['seoDescription'] ?? ($item['seoDescription'] ?? ''),
            'keywords' => $remap['keywords'] ?? ($item['keywords'] ?? ''),
        ];

        if (! empty($item['state'])) {
            $meta['state'] = $item['state'];
        }

        if (! empty($item['hideInSidebar'])) {
            $meta['hideInSidebar'] = true;
        }

        $path = $out.'/'.$target.'.md';

        // Le contenu est édité à la main depuis la migration : on n'écrase
        // pas sans --force.
        if (! $force && is_file($path)) {
            $report[] = ['-', $source['name'], $target, 'déjà présent, conservé'];

            continue;
        }

        if (! $dry) {
            @mkdir(dirname($path), 0o777, true);
            file_put_contents($path, frontMatter($meta)."\n\n".$markdown."\n");
        }

        $written++;
        $unknown = [...$unknown, ...$renderer->unknown];

        $flags = $renderer->unknown === [] ? 'ok' : count($renderer->unknown).' bloc(s) bruts';
        $report[] = [$source['tier'], $source['name'], $target, $flags];
    }
}

foreach ($report as [$tier, $src, $slug, $flag]) {
    printf("%-5s %-14s %-42s %s\n", $tier, $src, $slug, $flag);
}

echo "\n".$written." page(s) écrite(s) dans content/\n";

if ($unknown !== []) {
    echo "\nComposants sans équivalent Markdown, passés en :::raw :\n";

    foreach (array_count_values($unknown) as $name => $count) {
        printf("  %-46s %d\n", $name, $count);
    }
}

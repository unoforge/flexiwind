<?php

namespace Flexiwind\Docs;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Autolink\AutolinkExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\MarkdownConverter;

/**
 * Markdown -> Blade, au build.
 *
 * Le rendu final est du Blade compilé en PHP : au runtime il ne reste
 * aucun parsing Markdown. C'est la seule façon d'écrire en Markdown sans
 * payer une régression de perf.
 *
 * Ordre d'extraction — il compte :
 *   1. conteneurs   (récursif ; le parent prend plus de deux-points ;
 *                    :::raw y est traité verbatim)
 *   2. ::::tabs     (groupes de fences)
 *   3. fences       (bloc de code isolé ou terminal)
 *   4. tableaux     (GFM -> table du design system)
 *   5. feuilles     (::preview, ::reference, …)
 *   6. CommonMark, puis correspondance HTML -> composants
 */
final class MarkdownCompiler
{
    /** @var array<int, string> */
    private array $slots = [];

    public function compilePage(DocPage $page): string
    {
        [, $body] = FrontMatter::parse((string) file_get_contents($page->file));

        $wrapper = (string) config('flexiwind-docs.page_wrapper');
        $html = $this->compile($body, $page->tier());

        return <<<BLADE
        {{-- Généré depuis content/{$page->slug}.md — ne pas éditer à la main. --}}
        <x-{$wrapper} :current="\$current" :prev-slug="\$prevSlug" :next-slug="\$nextSlug">
        {$html}
        </x-{$wrapper}>
        BLADE;
    }

    public function compile(string $markdown, Tier $pageTier = Tier::Free): string
    {
        $this->slots = [];

        $markdown = str_replace("\r\n", "\n", $markdown);
        // Les conteneurs d'abord : le plus externe gagne, et son contenu est
        // recompilé récursivement. Sans ça, une fence à l'intérieur d'un
        // conteneur serait extraite avant lui et se perdrait.
        $markdown = $this->extractContainers($markdown, $pageTier);
        $markdown = $this->extractTabs($markdown);
        $markdown = $this->extractFences($markdown);
        $markdown = $this->extractTables($markdown);
        $markdown = $this->extractLeaves($markdown, $pageTier);

        $html = $this->converter()->convert($markdown)->getContent();

        return $this->restore($this->mapHtml($html));
    }

    // ------------------------------------------------------------ verbatim

    // --------------------------------------------------------------- code

    /** `::::tabs` contenant plusieurs fences -> un bloc de code à onglets. */
    private function extractTabs(string $markdown): string
    {
        return (string) preg_replace_callback(
            '/^(:{3,})tabs(\{[^}\n]*\})?[ \t]*\n(.*?)^\1[ \t]*$/ms',
            function (array $m): string {
                $blocks = $this->parseFences($m[3]);

                if ($blocks === []) {
                    return '';
                }

                $component = (string) config('flexiwind-docs.code.tabs');

                return $this->slot(
                    '<'.$component.' :data="['.implode(', ', array_map(
                        fn (array $b): string => $this->phpBlock($b),
                        $blocks
                    )).']" />'
                );
            },
            $markdown
        );
    }

    private function extractFences(string $markdown): string
    {
        return (string) preg_replace_callback(
            '/^```([^\n]*)\n(.*?)^```[ \t]*$/ms',
            function (array $m): string {
                $block = $this->fenceToBlock($m[1], rtrim($m[2], "\n"));
                $shells = (array) config('flexiwind-docs.code.shell_languages');

                if (in_array($block['lang'], $shells, true)) {
                    $component = (string) config('flexiwind-docs.code.terminal');

                    return $this->slot('<'.$component.' :code="base64_decode(\''.base64_encode($block['code']).'\')" />');
                }

                $component = (string) config('flexiwind-docs.code.single');
                $noTitle = $block['name'] === '' ? ' :no-title="true"' : '';

                return $this->slot('<'.$component.' :data="'.$this->phpBlock($block).'"'.$noTitle.' />');
            },
            $markdown
        );
    }

    /** @return array<int, array{name: string, lang: string, code: string, lines: string}> */
    private function parseFences(string $markdown): array
    {
        preg_match_all('/^```([^\n]*)\n(.*?)^```[ \t]*$/ms', $markdown, $matches, PREG_SET_ORDER);

        return array_map(
            fn (array $m): array => $this->fenceToBlock($m[1], rtrim($m[2], "\n")),
            $matches
        );
    }

    /** @return array{name: string, lang: string, code: string, lines: string} */
    private function fenceToBlock(string $info, string $code): array
    {
        $info = trim($info);
        $lang = 'text';

        if (preg_match('/^([\w+-]+)/', $info, $m)) {
            $lang = $m[1];
            $info = trim(substr($info, strlen($m[1])));
        }

        $attributes = $this->attributes($info);

        return [
            'name' => (string) ($attributes['title'] ?? ''),
            'lang' => $lang,
            'code' => $code,
            'lines' => $this->phpLines((string) ($attributes['lines'] ?? '')),
        ];
    }

    /** `lines="3:add,4:remove"` -> littéral PHP `[3 => 'add', 4 => 'remove']` */
    private function phpLines(string $raw): string
    {
        if (trim($raw) === '') {
            return '[]';
        }

        $pairs = [];

        foreach (explode(',', $raw) as $entry) {
            [$line, $class] = array_pad(explode(':', trim($entry), 2), 2, 'add');

            if (is_numeric($line)) {
                $pairs[] = (int) $line." => '".addslashes(trim((string) $class))."'";
            }
        }

        return '['.implode(', ', $pairs).']';
    }

    /** @param array{name: string, lang: string, code: string, lines: string} $block */
    private function phpBlock(array $block): string
    {
        return "['name' => '".addslashes($block['name'])."', 'lang' => '".addslashes($block['lang'])
            ."', 'code' => base64_decode('".base64_encode($block['code'])."'), 'lines' => ".$block['lines'].']';
    }

    // ------------------------------------------------------------ tableaux

    private function extractTables(string $markdown): string
    {
        return (string) preg_replace_callback(
            '/^(\|.+\|)[ \t]*\n\|[ \t:\-|]+\|[ \t]*\n((?:\|.*\|[ \t]*\n?)+)/m',
            function (array $m): string {
                $config = (array) config('flexiwind-docs.table');

                $columns = implode(', ', array_map(
                    fn (string $label): string => "['label' => '".addslashes(strip_tags($label))."']",
                    $this->cells($m[1])
                ));

                $rows = '';

                foreach (preg_split('/\n/', trim($m[2])) ?: [] as $line) {
                    if (trim($line) === '') {
                        continue;
                    }

                    $cells = '';

                    foreach ($this->cells($line) as $cell) {
                        $cells .= '<'.$config['cell'].'>'.$cell.'</'.$config['cell'].'>';
                    }

                    $rows .= '<'.$config['row'].'>'.$cells.'</'.$config['row'].'>';
                }

                return $this->slot(
                    '<'.$config['component'].' :columns="['.$columns.']">'.$rows.'</'.$config['component'].'>'
                );
            },
            $markdown
        );
    }

    /** @return string[] */
    private function cells(string $line): array
    {
        // Les pipes échappés (\|) font partie du texte, pas de la structure.
        $line = str_replace('\\|', "\x00", trim($line));
        $line = preg_replace('/^\|/', '', $line) ?? $line;
        $line = preg_replace('/\|$/', '', $line) ?? $line;

        return array_map(
            fn (string $cell): string => $this->inline(str_replace("\x00", '|', trim($cell))),
            explode('|', $line)
        );
    }

    private function inline(string $markdown): string
    {
        $html = $this->converter()->convert($markdown)->getContent();
        $html = preg_replace('#^<p>(.*)</p>\s*$#s', '$1', trim($html)) ?? $html;

        return $this->mapHtml($html);
    }

    // ----------------------------------------------------------- directives

    /** Conteneurs, récursifs. Le parent prend un niveau de deux-points de plus. */
    private function extractContainers(string $markdown, Tier $pageTier): string
    {
        return (string) preg_replace_callback(
            '/^(:{3,})([a-z][\w-]*)(\{[^}\n]*\})?[ \t]*\n(.*?)^\1[ \t]*$/ms',
            function (array $m) use ($pageTier): string {
                // :::raw — échappatoire : du Blade que le Markdown ne couvre pas,
                // émis verbatim sans jamais être touché.
                if ($m[2] === 'raw') {
                    return $this->slot(trim($m[4], "\n"));
                }

                $component = $this->directive($m[2]);

                if ($component === null) {
                    return $m[0];
                }

                $inner = (new self)->compile($m[4], $pageTier);

                return $this->slot($this->tag(
                    $component,
                    $this->attributes($m[3] ?? '', $m[2], $pageTier),
                    $inner
                ));
            },
            $markdown
        );
    }

    private function extractLeaves(string $markdown, Tier $pageTier): string
    {
        return (string) preg_replace_callback(
            '/^::([a-z][\w-]*)(\{[^}\n]*\})?[ \t]*$/m',
            function (array $m) use ($pageTier): string {
                $component = $this->directive($m[1]);

                if ($component === null) {
                    return $m[0];
                }

                return $this->slot($this->tag(
                    $component,
                    $this->attributes($m[2] ?? '', $m[1], $pageTier)
                ));
            },
            $markdown
        );
    }

    private function directive(string $name): ?string
    {
        $component = config('flexiwind-docs.directives.'.$name);

        return is_string($component) && $component !== '' ? $component : null;
    }

    /** @return array<string, string|bool> */
    private function attributes(string $raw, string $directive = '', ?Tier $pageTier = null): array
    {
        $attributes = [];
        $raw = trim($raw, '{} ');
        $offset = 0;

        // Scanner attentif aux guillemets : une valeur peut contenir { } ou =.
        while (preg_match('/\G\s*([\w-]+)(?:=("([^"]*)"|\'([^\']*)\'))?/', $raw, $m, 0, $offset)) {
            if (($m[1] ?? '') === '') {
                break;
            }

            $attributes[$m[1]] = isset($m[2]) && $m[2] !== '' ? ($m[3] ?? $m[4] ?? '') : true;
            $offset += strlen($m[0]);

            if ($m[0] === '') {
                break;
            }
        }

        // Le palier de la page se propage aux previews : c'est ce qui permet
        // au site free de verrouiller un artefact pro qu'il n'a pas sur disque.
        if ($pageTier !== null && in_array($directive, ['preview', 'source'], true)) {
            $attributes['tier'] ??= $pageTier->value;
        }

        return $attributes;
    }

    /** @param array<string, string|bool> $attributes */
    private function tag(string $tag, array $attributes = [], ?string $slot = null): string
    {
        $rendered = '<'.$tag;

        foreach ($attributes as $name => $value) {
            $rendered .= $value === true
                ? ' '.$name
                : ' '.$name.'="'.str_replace('"', '&quot;', (string) $value).'"';
        }

        return $slot === null
            ? $rendered.' />'
            : $rendered.'>'.$slot.'</'.$tag.'>';
    }

    // ----------------------------------------------------------------- HTML

    private function mapHtml(string $html): string
    {
        $html = $this->escapeInlineCode($html);

        foreach ((array) config('flexiwind-docs.html_map') as $tag => $component) {
            $html = (string) preg_replace(
                ['#<'.$tag.'(\s[^>]*)?>#i', '#</'.$tag.'>#i'],
                ['<'.$component.'$1>', '</'.$component.'>'],
                $html
            );
        }

        $link = (string) config('flexiwind-docs.link_component');

        $html = (string) preg_replace('#<a(\s[^>]*)?>#i', '<'.$link.'$1>', $html);

        return (string) preg_replace('#</a>#i', '</'.$link.'>', $html);
    }

    /**
     * Le code inline s'affiche, il ne s'exécute pas : `@vite`, `@livewireScripts`
     * ou `{{ $slot }}` sortent tels quels au lieu d'être compilés par Blade.
     */
    private function escapeInlineCode(string $html): string
    {
        return (string) preg_replace_callback(
            '#<code>(.*?)</code>#s',
            fn (array $m): string => '<code>'.preg_replace(['/@(?=\w)/', '/\{(\{|!!)/'], ['@@', '@{$1'], $m[1]).'</code>',
            $html
        );
    }

    // -------------------------------------------------------------- internes

    private function slot(string $content): string
    {
        $this->slots[] = $content;

        return "\n\nFWSLOT".(count($this->slots) - 1)."FWSLOT\n\n";
    }

    private function restore(string $html): string
    {
        $paragraph = preg_quote((string) config('flexiwind-docs.html_map.p', 'x-md.paragraph'), '#');

        // Un slot seul dans un paragraphe : on retire le paragraphe.
        $html = (string) preg_replace_callback(
            '#<'.$paragraph.'(?:\s[^>]*)?>\s*FWSLOT(\d+)FWSLOT\s*</'.$paragraph.'>#',
            fn (array $m): string => $this->slots[(int) $m[1]] ?? '',
            $html
        );

        return (string) preg_replace_callback(
            '#FWSLOT(\d+)FWSLOT#',
            fn (array $m): string => $this->slots[(int) $m[1]] ?? '',
            $html
        );
    }

    private function converter(): MarkdownConverter
    {
        $environment = new Environment([
            'html_input' => 'allow',
            'allow_unsafe_links' => false,
        ]);

        $environment->addExtension(new CommonMarkCoreExtension);
        $environment->addExtension(new AutolinkExtension);
        $environment->addExtension(new StrikethroughExtension);

        return new MarkdownConverter($environment);
    }
}

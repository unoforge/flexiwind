<?php

declare(strict_types=1);

namespace App\Flexiwind;

use DOMDocument;
use DOMElement;
use DOMNode;

/**
 * Le HTML d'un <x-ui.rich-text>, nettoyé sur le serveur avec la même liste
 * blanche que le navigateur. À appeler avant d'enregistrer, et de nouveau
 * avant d'afficher si le contenu vient d'ailleurs :
 *
 *     $post->body = RichText::clean($this->body);
 *     {!! RichText::clean($post->body) !!}
 *
 * Tout le reste disparaît : scripts, styles, attributs `on*`, liens
 * `javascript:`, images en `data:`, iframes.
 */
class RichText
{
    /** @var array<string, list<string>> */
    public const ALLOWED = [
        'p' => [], 'br' => [], 'strong' => [], 'em' => [], 'u' => [], 's' => [], 'sub' => [], 'sup' => [], 'code' => [], 'mark' => [],
        'h1' => [], 'h2' => [], 'h3' => [], 'blockquote' => [], 'pre' => [], 'ul' => [], 'ol' => [], 'li' => [], 'hr' => [],
        'a' => ['href'], 'figure' => ['data-align'], 'figcaption' => [], 'img' => ['src', 'alt'],
    ];

    protected const RENAME = ['b' => 'strong', 'i' => 'em', 'strike' => 's', 'del' => 's', 'div' => 'p', 'h4' => 'h3', 'h5' => 'h3', 'h6' => 'h3'];

    protected const DROP = ['script', 'style', 'iframe', 'object', 'embed', 'link', 'meta', 'template', 'svg', 'math', 'form', 'input', 'button', 'select', 'textarea', 'noscript', 'head', 'title'];

    protected const ALIGNABLE = ['p', 'h1', 'h2', 'h3'];

    /**
     * Les balises gardées et leurs attributs.
     *
     * @return array<string, list<string>>
     */
    protected static function allowed(): array
    {
        return static::ALLOWED;
    }

    /** Une valeur d'attribut sûre, ou null pour la retirer. */
    protected static function attribute(string $tag, string $name, string $value): ?string
    {
        return match ($name) {
            'href', 'src' => self::url($value, $name === 'src'),
            'data-align' => in_array($value, ['left', 'center', 'wide'], true) ? $value : null,
            default => mb_substr($value, 0, 300),
        };
    }

    /** Une balise vide de sens après nettoyage disparaît : image sans source, paragraphe vide. */
    protected static function keep(string $tag, DOMElement $element): bool
    {
        return ! ($tag === 'img' && ! $element->hasAttribute('src')) && ! ($tag === 'p' && ! $element->hasChildNodes());
    }

    /** Le style gardé d'une balise : l'alignement des paragraphes et des titres, rien d'autre. */
    protected static function style(string $tag, DOMElement $node): ?string
    {
        $style = $node->getAttribute('style');
        $align = preg_match('/text-align:\s*(center|right)/i', $style, $match) ? strtolower($match[1]) : strtolower($node->getAttribute('align'));

        return in_array($align, ['center', 'right'], true) && in_array($tag, static::ALIGNABLE, true) ? 'text-align: '.$align : null;
    }

    public static function clean(?string $html): string
    {
        if ($html === null || trim($html) === '') {
            return '';
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);
        $document->loadHTML('<?xml encoding="UTF-8"><body><div id="rt-root">'.$html.'</div></body>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD | LIBXML_NONET);
        libxml_clear_errors();
        libxml_use_internal_errors($previous);

        $root = $document->getElementById('rt-root');

        if (! $root) {
            return '';
        }

        static::walk($root, $document);

        // Dans un bloc de code, un saut de ligne est un caractère, pas un <br>.
        foreach (iterator_to_array($root->getElementsByTagName('pre')) as $pre) {
            foreach (iterator_to_array($pre->getElementsByTagName('br')) as $break) {
                $break->parentNode?->replaceChild($document->createTextNode("\n"), $break);
            }
        }

        $output = '';

        foreach (iterator_to_array($root->childNodes) as $child) {
            $output .= $document->saveHTML($child);
        }

        return trim((string) preg_replace('#^(<p></p>)+|(<p></p>)+$#', '', $output));
    }

    /** Le texte seul, pour un extrait, une recherche ou un compte de mots. */
    public static function text(?string $html): string
    {
        $text = html_entity_decode(strip_tags((string) preg_replace('#<(br|/p|/h[1-3]|/li|/blockquote|/pre|/figcaption|/tr)>#i', "$0\n", static::clean($html))), ENT_QUOTES | ENT_HTML5, 'UTF-8');

        return trim((string) preg_replace("/[ \t]+/", ' ', (string) preg_replace("/\n{3,}/", "\n\n", $text)));
    }

    public static function url(?string $url, bool $image = false): ?string
    {
        $value = trim((string) $url);

        if ($value === '' || preg_match('/[\x00-\x1F]/', $value)) {
            return null;
        }

        if (preg_match('#^(https?:|/(?!/)|\#|\.\.?/)#i', $value) || (! $image && preg_match('/^mailto:/i', $value))) {
            return $value;
        }

        return ! $image && preg_match('#^[\w-]+(\.[\w-]+)+([/?\#].*)?$#', $value) ? 'https://'.$value : null;
    }

    protected static function walk(DOMNode $parent, DOMDocument $document): void
    {
        foreach (iterator_to_array($parent->childNodes) as $node) {
            if ($node->nodeType === XML_TEXT_NODE) {
                continue;
            }

            if (! $node instanceof DOMElement) {
                $parent->removeChild($node);

                continue;
            }

            $tag = strtolower($node->tagName);

            if (in_array($tag, static::DROP, true)) {
                $parent->removeChild($node);

                continue;
            }

            static::walk($node, $document);

            $style = $node->getAttribute('style');

            if ($tag === 'span' && preg_match('/font-weight:\s*(bold|[6-9]00)/i', $style)) {
                $tag = 'strong';
            } elseif ($tag === 'span' && preg_match('/font-style:\s*italic/i', $style)) {
                $tag = 'em';
            }

            $tag = static::RENAME[$tag] ?? $tag;
            $allowed = static::allowed();

            if (! array_key_exists($tag, $allowed)) {
                while ($node->firstChild) {
                    $parent->insertBefore($node->firstChild, $node);
                }

                $parent->removeChild($node);

                continue;
            }

            $element = $document->createElement($tag);

            while ($node->firstChild) {
                $element->appendChild($node->firstChild);
            }

            foreach ($allowed[$tag] as $name) {
                if (! $node->hasAttribute($name)) {
                    continue;
                }

                $value = static::attribute($tag, $name, $node->getAttribute($name));

                if ($value !== null) {
                    $element->setAttribute($name, $value);
                }
            }

            if ($tag === 'a') {
                $element->setAttribute('rel', 'noopener noreferrer nofollow');
            }

            $kept = static::style($tag, $node);

            if ($kept !== null && $kept !== '') {
                $element->setAttribute('style', $kept);
            }

            if (! static::keep($tag, $element)) {
                $parent->removeChild($node);

                continue;
            }

            $parent->replaceChild($element, $node);
        }
    }
}

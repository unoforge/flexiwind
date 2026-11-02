<?php

namespace Flexiwind\Docs;

use Flexiwind\Docs\Contracts\CodeHighlighter;

final class PlainCodeHighlighter implements CodeHighlighter
{
    public function highlight(string $code, string $language = 'blade'): string
    {
        return '<pre class="fw-code fw-code--plain"><code>'.e($code).'</code></pre>';
    }
}

<?php

namespace Flexiwind\Docs\Contracts;

/**
 * Le docs-kit ne connaît pas Shiki. L'app hôte branche son implémentation :
 * le repo public reste autonome, l'app garde son thème et son cache.
 */
interface CodeHighlighter
{
    public function highlight(string $code, string $language = 'blade'): string;
}

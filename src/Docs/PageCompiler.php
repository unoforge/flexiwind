<?php

namespace Flexiwind\Docs;

use Illuminate\Support\Facades\File;

final class PageCompiler
{
    public function __construct(private readonly MarkdownCompiler $compiler) {}

    /** Compile si nécessaire, puis retourne le nom de vue à rendre. */
    public function ensure(DocPage $page): string
    {
        if ($this->isStale($page) && config('flexiwind-docs.auto_compile')) {
            $this->compile($page);
        }

        return $page->compiledView();
    }

    public function compile(DocPage $page): string
    {
        $target = $this->target($page);

        File::ensureDirectoryExists(dirname($target));
        File::put($target, $this->compiler->compilePage($page));

        return $target;
    }

    public function isStale(DocPage $page): bool
    {
        $target = $this->target($page);

        return ! File::exists($target) || File::lastModified($target) < File::lastModified($page->file);
    }

    public function target(DocPage $page): string
    {
        return rtrim((string) config('flexiwind-docs.compiled_path'), '/').'/'.$page->slug.'.blade.php';
    }
}

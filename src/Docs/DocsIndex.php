<?php

namespace Flexiwind\Docs;

use Illuminate\Support\Facades\File;

/**
 * Index des pages Markdown. Le chemin du fichier donne l'URL, le front
 * matter donne tout le reste : titre, groupe, ordre, palier, SEO.
 */
final class DocsIndex
{
    /** @var ContentRoot[] */
    private array $roots = [];

    /** @var array<string, DocPage>|null */
    private ?array $pages = null;

    public function addRoot(ContentRoot $root): self
    {
        $this->roots[] = $root;
        $this->pages = null;

        return $this;
    }

    /** @return array<string, DocPage> indexé par slug (= chemin d'URL) */
    public function pages(): array
    {
        if ($this->pages !== null) {
            return $this->pages;
        }

        $pages = [];
        $roots = $this->roots;
        usort($roots, fn (ContentRoot $a, ContentRoot $b): int => $a->priority <=> $b->priority);

        foreach ($roots as $root) {
            if (! File::isDirectory($root->path)) {
                continue;
            }

            foreach (File::allFiles($root->path) as $file) {
                if ($file->getExtension() !== 'md') {
                    continue;
                }

                [$meta] = FrontMatter::parse((string) File::get($file->getPathname()));

                $slug = trim(str_replace(
                    ['\\', '.md'],
                    ['/', ''],
                    substr($file->getPathname(), strlen($root->path) + 1)
                ), '/');

                // Un root de priorité supérieure écrase la même page.
                $pages[$slug] = new DocPage($file->getPathname(), $slug, $meta, $root);
            }
        }

        return $this->pages = $pages;
    }

    public function find(string $slug): ?DocPage
    {
        return $this->pages()[trim($slug, '/')] ?? null;
    }
}

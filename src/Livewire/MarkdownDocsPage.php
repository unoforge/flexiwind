<?php

namespace Flexiwind\Livewire;

use Flexiwind\Docs\DocsIndex;
use Flexiwind\Docs\Navigation;
use Flexiwind\Docs\PageCompiler;
use Illuminate\Support\Facades\View;
use Livewire\Component;

/**
 * Rend une page Markdown dans le chrome du site hôte.
 *
 * Le même composant sert le site free et le site pro : ce qui change
 * entre les deux, ce n'est pas la page, c'est ce que le résolveur
 * d'artefacts trouve sur le disque.
 */
class MarkdownDocsPage extends Component
{
    public array $current = [];

    public ?array $prevSlug = null;

    public ?array $nextSlug = null;

    public string $view = '';

    public string $path = '';

    public string $editUrl = '';

    public function mount(): void
    {
        // Le chemin de la requête EST le slug : /components/button -> components/button
        $slug = trim((string) request()->path(), '/');

        $index = app(DocsIndex::class);
        $page = $index->find($slug) ?? $index->find($slug.'/index');

        if ($page === null) {
            abort(404);
        }

        $neighbours = app(Navigation::class)->neighbours($page->url());

        $this->current = $page->toCurrent();
        $this->prevSlug = $neighbours['prev'];
        $this->nextSlug = $neighbours['next'];
        $this->path = $page->url();
        $this->editUrl = (string) $page->editUrl();
        $this->view = app(PageCompiler::class)->ensure($page);

        View::share('path', $this->path);
        View::share('current', $this->current);
        View::share('seo', $this->seo());
        View::share('docsLayoutData', ['path' => $this->path, 'seo' => $this->seo()]);
    }

    private function seo(): array
    {
        $base = (string) config('flexiwind-docs.seo.keywords', '');
        $keywords = trim($base.($this->current['keywords'] ?? '' ? ', '.$this->current['keywords'] : ''), ', ');

        return [
            'title' => 'Flexiwind | '.($this->current['title'] ?? ''),
            'description' => $this->current['seoDescription'] ?? '',
            'keywords' => $keywords,
            'ogImage' => [
                'src' => config('flexiwind-docs.seo.og_image', '/cover-flexiwind.png'),
                'alt' => config('flexiwind-docs.seo.og_alt', 'Flexiwind'),
            ],
        ];
    }

    public function render()
    {
        // Une section autonome (le cookbook) a son propre layout et sa propre sidebar.
        return view($this->view)->layout(app(Navigation::class)->layoutFor($this->path));
    }
}

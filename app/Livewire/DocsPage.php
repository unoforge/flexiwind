<?php

namespace App\Livewire;

use App\Support\PageViewResolver;
use App\Support\SidebarPaginator;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DocsPage extends Component
{
    public string $title = '';

    public string $description = '';

    public string $keywords = '';

    public ?array $prevSlug = null;

    public ?array $nextSlug = null;

    public ?array $current = null;

    public string $view = 'content.docs';

    public string $path = '';

    public array $seo = [];

    public function mount(?string $main = null, ?string $children = null)
    {
        $resolvedPage = PageViewResolver::resolve($this->view, [$main, $children], 'content');

        if (! $resolvedPage['exists']) {
            abort(404);
        }

        $this->view = $resolvedPage['view'];
        $this->path = $resolvedPage['path'];

        $pageData = SidebarPaginator::getPageData($this->path);

        $this->prevSlug = $pageData['prev'];
        $this->nextSlug = $pageData['next'];
        $this->current = $pageData['current'];
        $this->title = $pageData['title'];
        $this->description = $pageData['description'];
        $this->keywords = $pageData['keywords'];
        $this->seo = $pageData['seo'];
    }

    #[Layout('layouts::docs')]
    public function render()
    {
        return view($this->view)->layoutData([
            'path' => $this->path,
            'current' => $this->current,
            'seo' => $this->seo,
        ]);
    }
}

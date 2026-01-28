<?php

namespace App\Livewire;

use App\Support\SidebarPaginator;
use Illuminate\Support\Facades\View;
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

    public function mount(?string $main = null, ?string $children = null)
    {
        if ($main) {
            $this->view .= ".{$main}";
        }
        if ($children) {
            $this->view .= ".{$children}";
        }

        $segments = explode('.', $this->view);
        if ($segments[0] === 'livewire') {
            array_shift($segments);
        }

        // str_replace('/content', '', $this->path
        $this->path = str_replace('/content', '', '/'.implode('/', $segments));
    }

    #[Layout('layouts.docs', ['activeGroup' => 'getting-started', 'activeItem' => 'introduction', 'hideTableOfContent' => false, 'title' => '', 'description' => ''])]
    public function render()
    {
        if (! View::exists($this->view)) {
            abort(404);
        }

        $pagger = SidebarPaginator::getPagger($this->path);
        $this->prevSlug = $pagger['prev'];
        $this->nextSlug = $pagger['next'];
        $this->current = $pagger['current'];

        $this->title = $this->current['title'] ?? '';
        $this->description = $this->current['seoDescription'] ?? '';
        $this->keywords = $this->current['keywords'] ?? '';

        // dd($this->nextSlug);

        return view($this->view);
    }
}

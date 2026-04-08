<?php

namespace App\Livewire;

use App\Support\PageViewResolver;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.block')]
class PagePreview extends Component
{
    public string $view = 'livewire.preview-pages';

    public string $path = '';

    public function mount(?string $group = null, ?string $preview = null)
    {
        $resolvedPage = PageViewResolver::resolve($this->view, [$group, $preview], 'livewire');

        if (! $resolvedPage['exists']) {
            abort(404);
        }

        $this->view = $resolvedPage['view'];
        $this->path = $resolvedPage['path'];
    }

    public function render()
    {
        return view($this->view);
    }
}

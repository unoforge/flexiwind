<?php

namespace App\Livewire;

use Illuminate\Support\Facades\View;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.block')]
class PagePreview extends Component
{
        public string $view = 'livewire.preview-pages';
    public string $path = '';

    public function mount(?string $group = null, ?string $preview = null)
    {
        if ($group) {
            $this->view .= ".{$group}";
        }
        if ($preview) {
            $this->view .= ".{$preview}";
        }

        $segments = explode('.', $this->view);
        if ($segments[0] === 'livewire') {
            array_shift($segments);
        }
        $this->path = '/' . implode('/', $segments);
    }
    public function render()
    {
         if (!View::exists($this->view)) {
            abort(404);
        }
        return view($this->view);
    }
}

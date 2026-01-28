<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;

class PreviewUiController extends Controller
{
    public function __invoke(?string $group = null, ?string $preview = null)
    {
        $view = 'pages-preview';
        $path = '';

        if ($group) {
            $view .= ".{$group}";
        }
        if ($preview) {
            $view .= ".{$preview}";
        }

        $segments = explode('.', $view);
        if ($segments[0] === 'pages') {
            array_shift($segments);
        }
        $path = '/' . implode('/', $segments);

        if (!View::exists($view)) {
            abort(404);
        }

        return view($view, [
            'path' => $path,
        ]);
    }
}

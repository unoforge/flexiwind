<?php

namespace App\Http\Controllers;

use App\Support\PageViewResolver;

class PreviewUiController extends Controller
{
    public function __invoke(?string $group = null, ?string $preview = null)
    {
        $resolvedPage = PageViewResolver::resolve('pages-preview', [$group, $preview]);
        $view = $resolvedPage['view'];
        $path = $resolvedPage['path'];

        if (! $resolvedPage['exists']) {
            abort(404);
        }

        return view($view, [
            'path' => $path,
        ]);
    }
}

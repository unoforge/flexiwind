<?php

namespace App\Support;

use Illuminate\Support\Facades\View;

class PageViewResolver
{
    /**
     * @param  array<int, ?string>  $segments
     * @return array{view: string, path: string, exists: bool}
     */
    public static function resolve(string $baseView, array $segments = [], ?string $stripFirstSegment = null): array
    {
        $resolvedSegments = array_values(array_filter($segments, fn (?string $segment): bool => filled($segment)));
        $view = implode('.', array_filter([$baseView, ...$resolvedSegments]));

        $pathSegments = explode('.', $view);

        if ($stripFirstSegment !== null && ($pathSegments[0] ?? null) === $stripFirstSegment) {
            array_shift($pathSegments);
        }

        return [
            'view' => $view,
            'path' => '/'.implode('/', $pathSegments),
            'exists' => View::exists($view),
        ];
    }
}

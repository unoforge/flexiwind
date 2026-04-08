<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Spatie\ShikiPhp\Shiki;

class ShikiService
{
    /**
     * @var array<string, Shiki>
     */
    private static array $instances = [];

    public static function getInstance(string $theme = 'aurora-x'): Shiki
    {
        if (! isset(self::$instances[$theme])) {
            self::$instances[$theme] = new Shiki($theme);
        }

        return self::$instances[$theme];
    }

    public static function highlight(string $code, string $language = 'php', array $lines = []): string
    {
        $cacheKey = 'highlighted_'.md5($code.$language.serialize($lines));

        return Cache::memo()->rememberForever($cacheKey, function () use ($code, $language, $lines) {
            try {
                $highlighted = self::getInstance('aurora-x')->highlightCode($code, $language);

                return self::injectLineClasses($highlighted, $lines);
            } catch (\Throwable $e) {
                logger()->error('Code highlighting failed', [
                    'lang' => $language,
                    'error' => $e->getMessage(),
                ]);

                return '<pre><code>'.e($code).'</code></pre>';
            }
        });
    }

    protected static function injectLineClasses(string $html, array $lineClasses): string
    {
        if ($lineClasses === []) {
            return $html;
        }

        $lineIndex = 0;

        return preg_replace_callback(
            '/<span class="line(.*?)">/',
            function (array $matches) use ($lineClasses, &$lineIndex): string {
                $lineIndex++;
                $extraClass = $lineClasses[$lineIndex] ?? null;

                if ($extraClass) {
                    return '<span class="line'.$matches[1].' line--'.$extraClass.'">';
                }

                return $matches[0];
            },
            $html,
        );
    }
}

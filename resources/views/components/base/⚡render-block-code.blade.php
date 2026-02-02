<?php

use Livewire\Component;

new class extends Component {
    public string $highlightedCode = '';
    public string $code = '';
    public string $lang = 'php';
    public array $lines = [];

    public function mount(string $code, string $lang = 'php', array $lines = [])
    {
        $this->code = $code;
        $this->lang = $lang;
        $this->lines = $lines;

        $this->highlightCode();
    }

    private function highlightCode()
    {
        $cacheKey = 'highlighted_' . md5($this->code . $this->lang . serialize($this->lines));

        $this->highlightedCode = cache()->rememberForever($cacheKey, function () {
            try {
                $shiki = \App\Support\ShikiService::getInstance('aurora-x');
                $highlighted = $shiki->highlightCode($this->code, $this->lang);

                return $this->injectLineClasses($highlighted, $this->lines);
            } catch (\Throwable $e) {
                logger()->error('Code highlighting failed', [
                    'lang' => $this->lang,
                    'error' => $e->getMessage(),
                ]);

                return '<pre><code>' . e($this->code) . '</code></pre>';
            }
        });
    }

    private function injectLineClasses(string $html, array $lineClasses): string
    {
        if (empty($lineClasses)) {
            return $html;
        }

        $lineIndex = 0;
        return preg_replace_callback(
            '/<span class="line(.*?)">/',
            function ($matches) use ($lineClasses, &$lineIndex) {
                $lineIndex++;
                $extraClass = $lineClasses[$lineIndex] ?? null;
                if ($extraClass) {
                    return '<span class="line' . $matches[1] . ' line--' . $extraClass . '">';
                }
                return $matches[0];
            },
            $html,
        );
    }
};
?>


<figure data-code-snippet role="region" aria-label="codeblock region" class="py-3"
    wire:key="code-snippet-{{ uniqid() }}">
    @if ($highlightedCode)
        {!! $highlightedCode !!}
    @else
        <div class="text-gray-500">No code to display</div>
    @endif
</figure>

<?php

use Livewire\Component;
use Illuminate\Support\Facades\File;

new class extends Component {
    public string $filePath = '';
    public string $code = '';
    public bool $isLazy = true;

    // Cache duration in seconds (e.g., 1 hour)
    private const CACHE_TTL = 3600;

    public function mount(string $filePath = '', bool $isLazy = true): void
    {
        $this->filePath = $filePath;
        $this->isLazy = $isLazy;
        $this->loadComponentCode();
    }

    protected function loadComponentCode(): void
    {
        // Generate cache key based on file path and last modified time
        $cacheKey = 'component_code_' . md5($this->filePath . File::lastModified($this->filePath));

        // Use cache to store highlighted code
        $this->code = cache()->remember($cacheKey, self::CACHE_TTL, function () {
            if (!File::exists($this->filePath)) {
                return '';
            }
            $code = File::get($this->filePath);
            // Use singleton instance of ShikiService
            return $code;
        });
    }
};
?>

<x-docs.code-view-box class="bg-(--astro-code-color-background) inner-radius">
    <livewire:base.render-block-code :code="$code" lang="blade" />
</x-docs.code-view-box>

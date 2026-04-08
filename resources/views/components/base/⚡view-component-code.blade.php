<?php

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
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
        if (! File::exists($this->filePath)) {
            $this->code = '';

            return;
        }

        $cacheKey = 'component_code_'.md5($this->filePath.File::lastModified($this->filePath));

        $this->code = Cache::memo()->rememberForever($cacheKey, function (): string {
            return File::get($this->filePath);
        });
    }
};
?>

<x-docs.code-view-box class="bg-(--astro-code-color-background) inner-radius">
    <x-base.render-block-code :code="$code" lang="blade" />
</x-docs.code-view-box>

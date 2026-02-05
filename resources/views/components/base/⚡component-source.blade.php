<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Cache;

new class extends Component {
    public array $files = [];

    public function mount($data)
    {
        $this->files = is_array($data) ? $data : [$data];
    }

    #[Computed]
    public function data()
    {
        return collect($this->files)
            ->map(function ($filePath) {
                $fullPath = base_path($filePath);

                if (!file_exists($fullPath)) {
                    return [
                        'lang' => str_contains($filePath, '.blade') ? 'blade' : $this->determineLang($filePath),
                        'code' => '',
                        'name' => basename($filePath),
                    ];
                }

                $lastModified = filemtime($fullPath);
                $cacheKey = 'file_content_' . md5($filePath . '_' . $lastModified);

                $code = Cache::rememberForever($cacheKey, function () use ($fullPath) {
                    return file_get_contents($fullPath) ?: '';
                });

                return [
                    'lang' => str_contains($filePath, '.blade') ? 'blade' : $this->determineLang($filePath),
                    'code' => $code,
                    'name' => basename($filePath),
                ];
            })
            ->toArray();
    }

    protected function determineLang(string $path): string
    {
        static $langCache = [];

        $extension = pathinfo($path, PATHINFO_EXTENSION);
        if (isset($langCache[$extension])) {
            return $langCache[$extension];
        }

        $lang = match ($extension) {
            'php' => 'blade',
            'js' => 'js',
            'ts' => 'ts',
            'css' => 'css',
            'html' => 'html',
            'blade' => 'blade',
            'json' => 'json',
            'md' => 'markdown',
            default => 'text',
        };

        $langCache[$extension] = $lang;
        return $lang;
    }
};
?>

<livewire:base.load-code-in-tab :data="$this->data" />
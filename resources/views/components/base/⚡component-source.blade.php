<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\File;
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
        return once(function (): array {
            $fileSnapshots = collect($this->files)
                ->map(function (string $filePath): array {
                    $fullPath = base_path($filePath);
                    $exists = File::exists($fullPath);

                    return [
                        'filePath' => $filePath,
                        'fullPath' => $fullPath,
                        'exists' => $exists,
                        'lastModified' => $exists ? File::lastModified($fullPath) : 'missing',
                    ];
                })
                ->values()
                ->all();

            $cacheKey = 'component-source:data:'.md5(json_encode($fileSnapshots));

            return Cache::memo()->rememberForever($cacheKey, function () use ($fileSnapshots): array {
                return collect($fileSnapshots)
                    ->map(function (array $fileSnapshot): array {
                        $filePath = $fileSnapshot['filePath'];

                        if (! $fileSnapshot['exists']) {
                            return [
                                'lang' => str_contains($filePath, '.blade') ? 'blade' : $this->determineLang($filePath),
                                'code' => '',
                                'name' => basename($filePath),
                            ];
                        }

                        return [
                            'lang' => str_contains($filePath, '.blade') ? 'blade' : $this->determineLang($filePath),
                            'code' => File::get($fileSnapshot['fullPath']),
                            'name' => basename($filePath),
                        ];
                    })
                    ->toArray();
            });
        });
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

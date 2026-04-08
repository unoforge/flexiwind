<?php

use Livewire\Component;
use App\Support\ConfigData;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

new class extends Component {
    public string $name;
    public bool $isSingle;
    public array $data = [];

    private static array $langMap = [
        'blade.php' => 'blade',
        'php' => 'php',
        'js' => 'javascript',
        'ts' => 'typescript',
        'vue' => 'vue',
        'css' => 'css',
        'json' => 'json',
        'html' => 'html',
    ];

    private static function resolveLang(string $path): string
    {
        foreach (self::$langMap as $ext => $lang) {
            if (str_ends_with($path, '.' . $ext)) {
                return $lang;
            }
        }

        return 'plaintext';
    }
    public function mount(string $name)
    {
        $this->name = $name;
        $registry = ConfigData::registry();
        $filePath = $registry[$name] ?? null;

        if ($filePath === null) {
            $this->isSingle = true;
            $this->data = ['code' => '', 'lang' => 'text', 'name' => 'any-.php'];

            return;
        }

        $path = resource_path("registries/{$filePath}");

        if (! File::exists($path)) {
            $this->isSingle = true;
            $this->data = ['code' => '', 'lang' => 'text', 'name' => 'any-.php'];

            return;
        }

        $cacheKey = 'block-data:'.md5($name.'|'.$path.'|'.File::lastModified($path));

        $blockData = Cache::memo()->rememberForever($cacheKey, function () use ($path) {
            $decoded = json_decode(File::get($path), true);

            if (! is_array($decoded)) {
                return null;
            }

            $files = $decoded['files'] ?? [];
            $isSingle = count($files) === 1;

            if ($isSingle) {
                $file = $files[0] ?? [];
                $target = $file['target'] ?? $file['path'] ?? 'any-.php';

                return [
                    'isSingle' => true,
                    'data' => [
                        'name' => basename($target),
                        'code' => $file['content'] ?? '',
                        'lang' => self::resolveLang($target),
                    ],
                ];
            }

            return [
                'isSingle' => false,
                'data' => array_map(fn (array $file) => [
                    'name' => basename($file['target'] ?? $file['path']),
                    'code' => $file['content'] ?? '',
                    'lang' => self::resolveLang($file['target'] ?? $file['path']),
                ], $files),
            ];
        });

        if ($blockData === null) {
            $this->isSingle = true;
            $this->data = ['code' => '', 'lang' => 'text', 'name' => 'any-.php'];

            return;
        }

        $this->isSingle = $blockData['isSingle'];
        $this->data = $blockData['data'];
    }
};
?>

<div class="w-full overflow-hidden inner-radius">
    @if ($isSingle)
    <div data-code-block class="bg-[#07090F] group *:py-0 [&_figure>pre]:py-4 [&_figure>pre]:min-w-full [&_figure>pre]:w-max [&_figure>pre]:px-3 inner-radius overflow-auto max-h-140 xl:max-h-160 relative">
        <x-base.render-block-code :code="$data['code']" :lang="$data['lang']" :lines="$data['lines'] ?? []" />
         <x-atoms.btn-copy-code
            class="absolute top-4 right-4 z-40 invisible flex opacity-0 group-hover:visible group-hover:opacity-100 text-gray-300" />
    </div>
    @else
        <x-ui.tabs class="bg-gray-900 dark:bg-gray-900/50 inner-radius border border-gray-800">
            <x-ui.tabs.list-wrapper
                class="grid overflow-hidden grid-cols-[1fr_2rem] gap-3 px-3 items-center w-full">
                <x-ui.tabs.list unStyled class="flex items-center gap-x-0.5 flex-1 py-1 overflow-hidden overflow-x-auto">
                    @foreach ($data as $item)
                    @php
                        $id = Str::slug($item['name']);
                    @endphp
                        <x-ui.tabs.trigger un-styled :id="'tab-code-' . $id" 
                        class="text-sm flex items-center rounded-md text-gray-400 fx-active:bg-gray-950 px-2 py-1 fx-active:text-white hover:text-white ease-linear duration-200 focus:outline-none text-nowrap border border-transparent fx-active:border-gray-700">
                            <span class="iconify size-3.5 ph--file mr-1"></span>
                            <span>{{ $item['name'] }}</span>
                        </x-ui.tabs.trigger>
                    @endforeach
                </x-ui.tabs.list>
                <div class="flex items-center text-gray-300">
                    <x-atoms.btn-copy-code closest-el="[data-app-tabs]" :in-tabs="true" />
                </div>
            </x-ui.tabs.list-wrapper>
            <x-ui.tabs.panel-wrapper class="bg-[#07090F] border-t border-gray-800">
                @foreach ($data as $item)
                    @php
                        $id = Str::slug($item['name']);
                        $isFirst = $loop->first;
                    @endphp
                    <x-ui.tabs.panel wire:key="panel-{{ $id }}"
                         id="tab-code-{{ $id }}" active="$isFirst ?? false"
                        class="hidden fx-active:flex active:outline-gray-800/50 focus:outline-gray-800/50 w-full">
                        <div data-code-component data-code-block data-code-box-collapsible
                            class="relative group overflow-hidden max-h-140 xl:max-h-160 w-full grid inner-radius">
                            <div class="w-full flex h-full overflow-auto *:py-0 [&_figure>pre]:py-4 [&_figure>pre]:min-w-full [&_figure>pre]:w-max [&_figure>pre]:px-3">
                               <x-base.render-block-code :code="$item['code']" :lang="$item['lang']" :lines="$item['lines'] ?? []" />
                            </div>
                        </div>
                    </x-ui.tabs.panel>
                @endforeach
            </x-ui.tabs.panel-wrapper>
        </x-ui.tabs>
    @endif
</div>

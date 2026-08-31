@php
    $items = [
        [
            'text' => 'HTML',
            'description' => 'Vanilla HTML + JS',
            'path' => '#',
            'icon' => 'simple-icons--html5',
        ],
        [
            'text' => 'UnoUI',
            'description' => 'Flexiwind for UnoCSS blocks and components',
            'path' => '#',
            'icon' => 'simple-icons--unocss',
        ],
    ];
@endphp
<ul class="w-full flex flex-col">
    @foreach ($items as $item)
        <li class="w-full flex">
            <x-atoms.ui-link href="{{ $item['path'] }}"
                class="flex items-center gap-2 w-full hover:bg-muted/70 px-1.5 py-1 ui-card inner-radius">
                <div class="size-9 ui-subtle ui-subtle-gray inner-radius d-flex-place-center">
                    <x-ui.icon name="{{ $item['icon'] }}" />
                </div>
                <div class="flex-1 flex flex-col">
                    <span class="font-medium text-foreground line-clamp-1 text-sm">
                        {{ $item['text'] }}
                    </span>
                    <span class="text-xs text-muted-foreground line-clamp-1">
                        {{ $item['description'] }}
                    </span>
                </div>
            </x-atoms.ui-link>
        </li>
    @endforeach
</ul>

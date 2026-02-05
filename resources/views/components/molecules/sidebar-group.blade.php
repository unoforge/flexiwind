@props([
    'label' => '',
    'items' => [],
])

<div class="space-y-0.5 pt-5">
    <x-atoms.sidebar-item-block :label="$label">
        <ul class="space-y-2 text-fg-muted py-3">
            @foreach ($items as $item)
                @if (empty($item['hideInSidebar']))
                    <li class="flex">
                        <a
                            href="{{ $item['path'] }}"
                            aria-label="Link to {{ $item['title'] }}"
                            class="ease-linear text-sm fx-current:text-fg-title fx-current:bg-bg-subtle text-fg-muted font-light hover:text-fg-title px-3 py-1.5 rounded-lg hover:bg-bg-muted w-full"
                            wire:navigate.hover
                        >
                            {{ $item['title'] }}
                            @if (!empty($item['state']))
                                @switch($item['state'])
                                    @case('draft')
                                        <span aria-hidden="true" class="px-1 py-px text-sm rounded-lg ui-subtle ui-subtle-warning">
                                            draft
                                        </span>
                                        @break
                                    @case('updated')
                                        <span aria-hidden="true" class="px-1 py-px text-sm rounded-lg ui-subtle ui-subtle-info">
                                            updates
                                        </span>
                                        @break
                                    @case('new')
                                        <span aria-hidden="true" class="px-1 py-px text-sm rounded-lg ui-subtle ui-subtle-primary">
                                            new
                                        </span>
                                        @break
                                    @case('wip')
                                        <span aria-hidden="true" class="px-1 py-px text-sm rounded-lg ui-subtle ui-subtle-accent">
                                            Wip
                                        </span>
                                        @break
                                @endswitch
                            @endif
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </x-atoms.sidebar-item-block>
</div>
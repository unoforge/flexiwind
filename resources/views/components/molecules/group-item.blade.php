<li>
    @if ($noWire)
        <a href="{{ $path }}" aria-label="Link to {{ $title }}"
            class="flex items-center gap-x-2.5 fx-current:font-600 fx-current:text-fg-title text-fg hover:text-fg-title group">
            <span aria-hidden="true"
                class="size-7 flex items-center justify-center rounded-ui group-fx-current:ui-subtle group-fx-current:ui-subtle-gray group-not-fx-current:border group-not-fx-current:border-border">
                <span class="flex iconify {{ $icon }} text-sm"></span>
            </span>
            <span>
                {{ $title }}
            </span>
        </a>
    @else
        <a wire:navigate.hover href="{{ $path }}" aria-label="Link to {{ $title }}"
            class="flex items-center gap-x-2.5 fx-current:font-600 fx-current:text-fg-title text-fg hover:text-fg-title group">
            <span aria-hidden="true"
                class="size-7 flex items-center justify-center rounded-ui group-fx-current:ui-subtle group-fx-current:ui-subtle-gray group-not-fx-current:border group-not-fx-current:border-border">
                <span class="flex iconify {{ $icon }} text-sm"></span>
            </span>
            <span>
                {{ $title }}
            </span>
        </a>
    @endif
</li>

@props(['icon', 'text', 'href', 'isActive' => false])

<li>
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : 'inactive' }}" class="flex items-center gap-3 px-2 h-9 fx-current:bg-white dark:fx-current:bg-bg-surface fx-current:text-fg-title fx-current:ring-border-input/70
            fx-active:bg-white dark:fx-active:bg-bg-surface fx-active:text-fg-title fx-active:ring-border-input/70
            text-fg-muted hover:bg-bg-muted/50 ring ring-transparent rounded-ui text-sm">
        <span aria-hidden="true"
            class="iconify size-4 opacity-70 {{ $icon }} in-fx-active:text-primary in-fx-current:text-primary"></span>
        <span>{{ $text }}</span>
    </a>
</li>
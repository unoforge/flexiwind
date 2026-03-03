@props(['icon', 'text', 'href', 'isActive' => false])

<li>
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : 'inactive' }}"
        class="flex items-center gap-3 px-2 py-1.5 rounded-ui text-sm transition-colors text-fg-muted/80 hover:bg-bg-surface fx-current:bg-bg-muted/60 fx-active:bg-bg-muted/60 fx-active:text-fg-title fx-current:text-fg-title font-medium">
        <span aria-hidden="true" class="iconify size-4 opacity-80 {{ $icon }}"></span>
        <span>{{ $text }}</span>
    </a>
</li>

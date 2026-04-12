@props(['icon', 'text', 'href', 'isActive' => false])

<li>
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : 'inactive' }}" class="flex items-center gap-3 px-2 h-9 fx-current:bg-bg-muted/60 fx-current:text-fg-title fx-active:bg-bg-muted/60 fx-active:text-fg-title text-fg-muted hover:bg-bg-muted/50 rounded-ui text-sm">
        <x-ui.icon size="sm" :name="$icon"
            class="opacity-70 in-fx-active:text-primary in-fx-current:text-primary"/>
        <span>{{ $text }}</span>
    </a>
</li>
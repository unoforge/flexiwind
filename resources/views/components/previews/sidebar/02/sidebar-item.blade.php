@props(['icon', 'text', 'href', 'isActive' => false])

<li>
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : 'inactive' }}" class="flex items-center gap-3 px-2 h-9 fx-current:bg-muted/60 fx-current:text-foreground fx-active:bg-muted/60 fx-active:text-foreground text-muted-foreground hover:bg-muted/50 rounded-ui text-sm">
        <x-ui.icon size="sm" :name="$icon"
            class="opacity-70 in-fx-active:text-foreground in-fx-current:text-foreground"/>
        <span>{{ $text }}</span>
    </a>
</li>
@props(['text', 'icon', 'href' => '', 'isActive' => null])

<li
    class="relative before:absolute before:-left-0.5 before:w-0.5 before:inset-y-2.5 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-foreground">
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : null }}" aria-label="Link to {{ $text }}"
        class="flex items-center text-sm h-10 px-3 py-1.5 gap-x-2.5 fx-active:bg-background  fx-active:text-foreground fx-current:bg-background  fx-current:text-foreground border border-transparent fx-active:border-muted/90 fx-active:shadow-xs fx-current:border-muted/70 fx-current:shadow-xs rounded-ui">
        <x-ui.icon size="xs" :name="$icon"/>
        {{ $text }}
    </a>
</li>

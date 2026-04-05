@props(['text', 'icon', 'href' => '', 'isActive' => null])

<li
    class="relative before:absolute before:-left-0.5 before:w-0.5 before:inset-y-2.5 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-fg-title">
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : null }}" aria-label="Link to {{ $text }}"
        class="flex items-center text-sm h-10 px-3 py-1.5 gap-x-2.5 fx-active:bg-bg fx-active:text-primary fx-current:bg-bg fx-current:text-primary border border-transparent fx-active:border-bg-muted/70 fx-active:shadow-xs fx-current:border-bg-muted/70 fx-current:shadow-xs rounded-ui">
        <span class="flex iconify size-3.5 {{ $icon }}"></span>
        {{ $text }}
    </a>
</li>

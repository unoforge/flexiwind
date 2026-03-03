@props(['text', 'icon', 'href' => '', 'isActive' => null])

<li
    class="relative before:absolute before:-left-1 before:w-1 before:inset-y-1.5 before:rounded-l-md before:bg-transparent has-fx-active:before:bg-fg-title">
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : null }}" aria-label="Link to {{ $text }}"
        class="flex items-center text-sm px-3 py-1.5 gap-x-2.5 fx-active:bg-bg fx-active:text-fg-title border border-transparent fx-active:border-bg-muted/70 fx-active:shadow-xs rounded-md">
        <span class="flex iconify size-3.5 {{ $icon }}"></span>
        {{ $text }}
    </a>
</li>

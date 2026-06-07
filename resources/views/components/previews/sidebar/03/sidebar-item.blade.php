@props(['text', 'icon', 'href' => '', 'isActive' => null])

<li class="flex h-max w-full">
    <a href="{{ $href }}" data-state="{{ $isActive ? 'active' : null }}" aria-label="Link to {{ $text }}"
        class="flex flex-1 items-center gap-3 px-3 py-2.5 rounded-ui text-sm text-white/65 hover:bg-white/5 hover:text-white/90 font-medium whitespace-nowrap transition-all duration-150
                fx-active:bg-white/8 fx-active:text-white fx-current:bg-white/8 fx-current:text-white">
        <x-ui.icon size="xs" :name="$icon" />
        <span class="md:group-fx-resized:hidden">
            {{ $text }}
        </span>
    </a>
</li>

{{-- Un nombre en fin d'étiquette : Issues <x-ui.tag.count>12</x-ui.tag.count>. --}}
<span data-slot="tag-count" {{ $attributes->class(['text-[0.92em] font-medium tabular-nums text-muted-foreground group-aria-pressed/tag:text-current group-aria-pressed/tag:opacity-75']) }}>{{ $slot }}</span>

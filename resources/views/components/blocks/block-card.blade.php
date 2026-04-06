<a href="{{ route('blocks.show', [$group, $key]) }}" aria-label="Link to blocks : {{ $title }}"
    class="hover:bg-bg-surface p-px rounded-ui group ease-linear duration-200 w-full">
    <div class="aspect-standard-tv bg-bg-muted/30 rounded-ui pointer-events-none">
        <img src="{{ $illustrations['light'] }}" alt="Illustration light {{ $title }}" width="1455"
            height="1091" class="size-full object-cover dark:hidden">
        <img src="{{ $illustrations['dark'] }}" alt="Illustration dark {{ $title }}" width="1455"
            height="1091" class="size-full object-cover not-dark:hidden">
    </div>
    <div class="mt-2 pb-2 flex justify-between items-center px-2">
        <h3 class="font-medium text-fg-title">
            {{ $title }}
        </h3>
        <span aria-hidden="true"
            class="iconify ph--arrow-right size-3.5 text-fg-muted origin-left ease-linear duration-200 opacity-0 scale-x-60 group-hover:opacity-100 group-hover:scale-x-100"></span>
    </div>
</a>

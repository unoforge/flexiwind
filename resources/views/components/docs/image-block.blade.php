<div
    class="w-full ui-card [--card-padding:0.25rem] [--card-radius:var(--global-main-radius)] border border-gray-200 dark:border-gray-800/60 bg-gray-50 dark:bg-gray-900/50"
>
    @if(isset($dark))
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            width="1728"
            height="1117"
            class="w-full aspect-auto inner-radius dark:hidden"
        />
        <img
            src="{{ $dark['src'] }}"
            alt="{{ $dark['alt'] }}"
            width="1728"
            height="1117"
            class="w-full aspect-auto inner-radius hidden dark:block"
        />
    @else
        <img
            src="{{ $src }}"
            alt="{{ $alt }}"
            width="1728"
            height="1117"
            class="w-full aspect-auto inner-radius"
        />
    @endif
</div>
@props(['subtitle' => null, 'title', 'description', 'class' => ''])

<div
    class="px-3.5 sm:px-8 md:px-16 lg:px-8 xl:px-0 mx-auto w-full max-w-3xl lg:max-w-5xl flex flex-col {{ $class }}">
    @if ($subtitle)
        <span class="w-max px-2 text-sm rounded-ui ui-subtle ui-subtle-gray">
            {{ $subtitle }}
        </span>
    @endif
    <h2 class="font-semibold text-fg-title text-3xl sm:text-4xl max-w-xl {{ $subtitle ? 'mt-2' : '' }}">{{ $title }}
    </h2>
    <p class="text-fg-muted max-w-md text-sm mt-2.5">{{ $description }}</p>
    {{ $slot }}
</div>

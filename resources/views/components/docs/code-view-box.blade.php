@props([
    'class' => '',
    'defaultSetting' => false,
    'unstilled' => false,
    'noCopyButton' => false,
])

<div data-code-component data-code-block data-code-box-collapsible
    class="relative group {{ !$unstilled ? 'overflow-hidden max-h-[35rem] w-full grid border border-border-strong/30' : '' }} {{ $defaultSetting ? 'rounded-lg bg-(--astro-code-color-background)' : '' }} {{ $class }}">
    @if (!$noCopyButton)
        <x-atoms.btn-copy-code
            class="absolute top-4 right-4 z-40 invisible flex opacity-0 group-hover:visible group-hover:opacity-100 text-gray-300" />
    @endif
    <div class="w-full flex h-full overflow-auto ">
        {{ $slot }}
    </div>
</div>

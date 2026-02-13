@props(['title', 'description'])

<section class="w-full lg:max-w-336 xl:max-w-352 mx-auto pt-12 px-3.5 sm:px-4 xl:px-8">
    <x-ui.breadcrumb class="gap-2.5 whitespace-nowrap text-fg capitalize text-sm md:text-base">
        <x-ui.breadcrumb.item separator="ph--caret-right" href="#" text="Blocks" />
        <x-ui.breadcrumb.item  active :text="$title" />
    </x-ui.breadcrumb>
    <h2 class="text-fg-title mt-3 font-medium text-lg md:text-xl max-w-xl">
        {{ $title }}
    </h2>
    <p class="max-w-lg text-sm md:text-base text-fg-muted font-300 mt-1">
        {{ $description }}
    </p>
</section>

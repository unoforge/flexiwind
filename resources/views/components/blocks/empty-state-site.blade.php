@props(['title','description'])
<div class="mx-auto w-full lg:max-w-300 border border-border-strong/70 py-14 border-dashed relative rounded-ui">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 flex noise-subtle opacity-60 dark:opacity-50">
    </div>
    <div class="px-3.5 sm:px-8 md:px-16 lg:px-8 xl:px-0 mx-auto w-full max-w-3xl lg:max-w-5xl flex flex-col">
        <h2
            class="font-bold text-3xl md:text-4xl/tight max-w-2xl text-balance text-transparent bg-clip-text bg-linear-to-br from-fg-title to-fg-muted/60 dark:via-fg">
            {{ $title }}
        </h2>
        <p class="text-fg-muted max-w-md text-sm mt-3.5">
            {{ $description }}
        </p>
        {{ $slot }}
    </div>
</div>

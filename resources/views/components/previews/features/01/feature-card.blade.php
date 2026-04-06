@props(['icon', 'title', 'description'])
<div class="rounded-ui p-6 sm:p-8 lg:p-10 bg-bg-surface flex flex-col hover:bg-bg-muted ease-linear">
    <div class="p-3 rounded-md bg-bg shadow-sm text-fg-subtitle flex items-center justify-center w-max">
        <span class="iconify {{ $icon }} size-6"></span>
    </div>
    <h3 class="text-fg-title font-medium text-2xl mt-10">
        {{ $title }}
    </h3>
    <p class="text-fg-muted text-sm mt-4">
        {{ $description }}
    </p>
</div>

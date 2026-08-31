@props(['icon', 'title', 'description'])
<div class="rounded-ui p-6 sm:p-8 lg:p-10 bg-card flex flex-col hover:bg-muted ease-linear">
    <div class="p-3 rounded-md bg-background  shadow-sm text-foreground flex items-center justify-center w-max">
        <x-ui.icon name="{{ $icon }}" class="size-6" />
    </div>
    <h3 class="text-foreground font-medium text-2xl mt-10">
        {{ $title }}
    </h3>
    <p class="text-muted-foreground text-sm mt-4">
        {{ $description }}
    </p>
</div>

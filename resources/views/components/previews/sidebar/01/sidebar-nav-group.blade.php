@props(['title', 'items' => []])
<div class="mt-6 first:mt-1">
    <div class="px-2 text-xs font-medium text-fg-muted/70 uppercase tracking-wider">
        {{ $title }}
    </div>
    <ul class="flex flex-col mt-1.5 space-y-0.5">
        @foreach ($items as $item)
            <x-previews.sidebar.01.sidebar-item :href="$item['href']" :text="$item['text']" :icon="$item['icon']"
                :is-active="$item['isActive'] ?? false" />
        @endforeach
    </ul>
</div>

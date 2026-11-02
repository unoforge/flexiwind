<div x-data="{ status: ['open', 'review'] }" class="flex w-full max-w-sm flex-col gap-3">
    <x-ui.tag-group label="Status" selectable multiple variant="outline" x-model="status">
        <x-ui.tag value="open" label="Open">Open <x-ui.tag.count>12</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="review" label="In review">In review <x-ui.tag.count>4</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="merged" label="Merged">Merged <x-ui.tag.count>31</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="closed" label="Closed">Closed <x-ui.tag.count>7</x-ui.tag.count></x-ui.tag>
    </x-ui.tag-group>
    <code class="text-xs text-muted-foreground" x-text="JSON.stringify(status)"></code>
</div>

<div class="flex flex-col gap-4">
    <x-ui.tag-group label="Soft — removable" removable>
        <x-ui.tag value="draft">Draft</x-ui.tag>
        <x-ui.tag value="laravel" label="laravel"><x-ui.icon name="ph--hash" size="xs" /> laravel</x-ui.tag>
        <x-ui.tag value="live" label="Live"><x-ui.tag.dot class="text-success" /> Live</x-ui.tag>
    </x-ui.tag-group>
    <x-ui.tag-group label="Outline — pick several" variant="outline" selectable multiple value="alice">
        <x-ui.tag value="alice" label="Alice"><x-ui.tag.avatar src="https://i.pravatar.cc/40?u=alice" /> Alice</x-ui.tag>
        <x-ui.tag value="issues" label="Issues">Issues <x-ui.tag.count>12</x-ui.tag.count></x-ui.tag>
        <x-ui.tag value="docs" label="Docs"><x-ui.icon name="ph--book-open" size="xs" /> Docs</x-ui.tag>
    </x-ui.tag-group>
    <x-ui.tag-group label="Solid — removable" variant="solid" removable>
        <x-ui.tag value="new">New</x-ui.tag>
        <x-ui.tag value="featured" label="Featured"><x-ui.icon name="ph--star-fill" size="xs" /> Featured</x-ui.tag>
    </x-ui.tag-group>
    <x-ui.tag-group label="Sizes — pick one" selectable value="md">
        <x-ui.tag value="sm" size="sm">Small</x-ui.tag>
        <x-ui.tag value="md">Medium</x-ui.tag>
        <x-ui.tag value="lg" size="lg">Large</x-ui.tag>
    </x-ui.tag-group>
</div>

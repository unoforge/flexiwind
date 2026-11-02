<x-ui.listbox.item :value="$option['value']" :label="$option['label']" :disabled="$option['disabled']"
    :data-avatar="$option['avatar']" :data-description="$option['description']">
    @if ($option['icon'])
        <x-ui.listbox.icon :name="$option['icon']" />
    @endif
    @if ($option['avatar'])
        <x-ui.listbox.avatar :src="$option['avatar']" />
    @endif
    <x-ui.listbox.label>{{ $option['label'] }}</x-ui.listbox.label>
    @if ($option['description'])
        <x-ui.listbox.description>{{ $option['description'] }}</x-ui.listbox.description>
    @endif
</x-ui.listbox.item>

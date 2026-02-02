@php
    $items = [
        [
            'id' => '01',
            'title' => 'Is it accessible?',
            'description' => 'Yes. It adheres to the WAI-ARIA design pattern.',
        ],
        [
            'id' => '02',
            'title' => 'Is it unstyled?',
            'description' => "Yes. It's unstyled by default, giving you freedom over the look and feel.",
        ],
        [
            'id' => '03',
            'title' => 'Can it be animated?',
            'description' => 'Yes! You can use the transition prop to configure the animation.',
        ],
    ];
@endphp

<x-ui.accordion class="space-y-2">
    @foreach ($items as $item)
        <x-ui.accordion.item :id="'item-' . $item['id']" variant="soft" class="rounded-md">
            <x-ui.accordion.trigger class="py-2 px-4 text-fg-subtitle font-medium text-lg">
                {{ $item['title'] }}
                <x-ui.accordion.indicator/>
            </x-ui.accordion.trigger>
            <x-ui.accordion.content>
                <p class="p-4 text-fg">
                    {{ $item['description'] }}
                </p>
            </x-ui.accordion.content>
        </x-ui.accordion.item>
    @endforeach
</x-ui.accordion>

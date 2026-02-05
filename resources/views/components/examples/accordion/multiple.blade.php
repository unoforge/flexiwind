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

<x-ui.accordion multiple keepOneOpen class="space-y-2">
    @foreach ($items as $item)
        <x-ui.accordion.item :id="'item-' . $item['id']" variant="default">
            <x-ui.accordion.trigger class="pb-2 text-fg-subtitle font-medium text-lg">
                {{ $item['title'] }}
                <x-ui.accordion.indicator/>
            </x-ui.accordion.trigger>
            <x-ui.accordion.content>
                <p class="py-2 text-fg">
                    {{ $item['description'] }}
                </p>
            </x-ui.accordion.content>
        </x-ui.accordion.item>
    @endforeach
</x-ui.accordion>

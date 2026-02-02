@props([
    'columns' => [
        ['label' => 'Prop', 'class' => ''],
        ['label' => 'Description', 'class' => '']
    ],
    'headerBg' => 'gray',
    'wrapperClass' => 'rounded-lg border border-border-strong/70 p-1 mt-6',
    'headerClass' => 'bg-bg-muted/80',
    'rowClass' => '',
    'firstColClass' => 'font-medium text-fg-muted',
])

<x-ui.table noDivider :wrapper="$wrapperClass">
    <x-ui.table.columns :header-bg-style="$headerBg" :class="'*:first:rounded-l-md *:last:rounded-r-md ' . $headerClass">
        @foreach($columns as $column)
            <x-ui.table.column :class="$column['class'] ?? ''">
                {{ $column['label'] }}
            </x-ui.table.column>
        @endforeach
    </x-ui.table.columns>
    <x-ui.table.rows :class="$rowClass">
        {{ $slot }}
    </x-ui.table.rows>
</x-ui.table>

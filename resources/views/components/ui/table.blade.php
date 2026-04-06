@props(['wrapper' => '', 'divider' => true, 'grid' => false, 'striped' => false, 'hoverable' => false])

@php
    $grid_class = $grid ? 'border border-(--table-border-color)' : '';
@endphp
<div
    class="relative overflow-x-auto w-full [--table-border-color:--alpha(var(--color-border-strong)/60%)] {{ $wrapper }} {{ $grid_class }}">
    <table @if ($grid) data-table-grid @endif
        @if ($striped) data-table-striped @endif 
        @if ($hoverable) data-table-hoverable @endif
        {{ $attributes->class([
            'w-full divide-(--table-border-color)',
            '[--gutter-x:--spacing(5)] [--gutter-y:--spacing(2.5)]',
            'divide-y' => $divider,
            'in-fx-table-grid:divide-y',
        ]) }}>
        {{ $slot }}
    </table>
</div>

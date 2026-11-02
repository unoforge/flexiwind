<div class="flex flex-col items-center gap-4">
    <x-ui.toggle-group variant="segmented" label="Range" value="week" required
        :options="['day' => 'Day', 'week' => 'Week', 'month' => 'Month', 'year' => 'Year']" />
    <x-ui.toggle-group variant="segmented" label="Layout" value="grid" required>
        <x-ui.toggle-group.item value="grid" aria-label="Grid"><x-ui.icon name="ph--squares-four" /></x-ui.toggle-group.item>
        <x-ui.toggle-group.item value="list" aria-label="List"><x-ui.icon name="ph--list" /></x-ui.toggle-group.item>
    </x-ui.toggle-group>
</div>

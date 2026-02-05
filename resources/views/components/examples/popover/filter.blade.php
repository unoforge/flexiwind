<x-ui.popover.trigger size="sm" iconOnly variant="outline" intent="gray" popover-id="demo-1">
    <span aria-hidden="true" class="iconify ph--funnel"></span>
</x-ui.popover.trigger>
<x-ui.popover id="demo-1" class="w-72">
    <span class="text-fg mb-4 border-b border-border pb-3 font-medium">Filter</span>
    <form class="w-full flex flex-col space-y-2.5">
        <div class="space-y-1.5 flex flex-col p-2.5 bg-bg-muted/50 rounded-md">
            <x-ui.radio checked name="event_interval" id="all" label="All events" />
            <x-ui.radio name="event_interval" id="passed_event" label="Passed events" />
            <x-ui.radio name="event_interval" id="upcoming_event" label="Upcoming events" />
        </div>
        <div class="relative">
            <x-ui.input type="email" placeholder="Search somthing" class="ps-8" size="sm"/>
            <span aria-hidden="true" class="absolute left-3 h-full flex items-center top-0 text-fg pointer-events-none">
                <span class="flex text-sm iconify ph--magnifying-glass"></span>
            </span>
        </div>
        <div class="relative">
            <x-ui.select name="location" id="location" class="ps-8" size="sm">
                <option value="barca">Barcelona</option>
                <option value="miami">Miami</option>
                <option value="lubumbashi">Lubumbashi</option>
            </x-ui.select>
            <span aria-hidden="true" class="absolute left-3 h-full flex items-center top-0 text-fg pointer-events-none">
                <span aria-hidden="true" class="flex iconify ph--flag text-sm"></span>
            </span>
        </div>
        <div class="relative">
            <x-ui.select name="categories" id="categories" class="ps-8" size="sm">
                <option value="barca">Barcelona</option>
                <option value="miami">Miami</option>
                <option value="lubumbashi">Lubumbashi</option>
            </x-ui.select>
            <span aria-hidden="true" class="absolute left-3 h-full flex items-center top-0 text-fg pointer-events-none">
                <span aria-hidden="true" class="flex iconify ph--map-pin-line text-sm"></span>
            </span>
        </div>
        <x-ui.button size="sm" class="mt-4 justify-center">
            Filter
        </x-ui.button>
    </form>
</x-ui.popover>

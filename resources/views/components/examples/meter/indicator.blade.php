<div class="flex flex-col gap-8 w-full">
    <div>
        <div class="flex justify-end" style="width: 40%">
            <span class="text-sm text-fg">40%</span>
        </div>
        <x-ui.meter max="10" value="4" class="text-primary" />
    </div>
    <div class="relative h-max">
        <div class="flex justify-end absolute top-0 left-0 h-6 items-center z-5" style="width: 60%">
            <span class="text-sm text-white">60%</span>
        </div>
        <x-ui.meter size="xl" max="10" value="6" class="text-primary" />
    </div>
</div>

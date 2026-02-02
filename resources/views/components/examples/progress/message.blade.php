<div class="flex flex-col gap-8 w-full">
    <div class="flex flex-col w-full">
        <x-ui.progress max="10" value="4" class="text-warning" />
        <div class="flex justify-end text-right">
            <span class="text-warning text-sm">Installing ...</span>
        </div>
    </div>
    <div class="flex items-center gap-x-6">
        <x-ui.progress max="10" value="6" class="text-primary" />
        <div class="text-sm text-fg">60%</div>
    </div>
    <div class="flex items-center gap-x-6">
        <x-ui.progress max="10" value="3" class="flex-1 text-danger" />
        <div class="text-sm text-white bg-danger rounded-full size-5 min-w-5 flex items-center justify-center">
            <span class="iconify ph--x text-xs"></span>
        </div>
    </div>
    <div class="flex items-center gap-x-6 w-full">
        <x-ui.progress max="10" value="10" class="flex-1 text-success" />
        <div class="text-white bg-success rounded-full size-5 flex items-center justify-center">
            <span class="iconify ph--check text-xs"></span>
        </div>
    </div>
</div>

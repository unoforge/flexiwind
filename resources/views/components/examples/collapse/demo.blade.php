<div class="w-full max-w-xs flex flex-col gap-4">
    <div class="flex flex-col w-full max-w-xs">
        <x-ui.collapse.trigger target="demo-collapse" class="gap-2 text-sm text-fg py-1 w-full justify-between">
            <div> Add tax details</div>
        </x-ui.collapse.trigger>
        <x-ui.collapse id="demo-collapse">
            <p class="text-fg-muted text-sm">
                You can add your tax information to your invoices, including your company name, tax ID, and billing
                address.
            </p>
        </x-ui.collapse>
    </div>

    <div class="flex flex-col w-full max-w-xs">
        <x-ui.collapse.trigger indicatorType="plus-sign" target="demo-collapse-2"
            class="gap-2 text-sm text-fg py-1 w-full justify-between">
            <div class="flex-1 truncate text-left">With Plus sign Indicator</div>
        </x-ui.collapse.trigger>
        <x-ui.collapse id="demo-collapse-2">
            <p class="text-fg-muted text-sm">
                You can add your tax information to your invoices, including your company name, tax ID, and billing
                address.
            </p>
        </x-ui.collapse>
    </div>

</div>

<div>
    <div class="grid grid-cols-[auto_minmax(0,1fr)] gap-4 overflow-hidden">
        <div class="grid text-sm text-fg-muted mt-14 pl-3 sm:pl-0">
            <div>Primary</div>
            <div>Secondry</div>
            <div>Accent</div>
            <div>Success</div>
            <div>Info</div>
            <div>Warning</div>
            <div>Danger</div>
            <div>Gray</div>
            <div>Neutral</div>
            <div>White</div>
        </div>
        <div class="grid overflow-hidden">
            <div data-invisible-scrollbar class="grid overflow-x-auto">
                <div class="grid grid-cols-4 gap-4 px-4 text-sm text-fg-muted pb-3">
                    <div>Solid</div>
                    <div>Outline</div>
                    <div>Soft</div>
                    <div>Ghost</div>
                </div>
                <div class="p-4 rounded-md border border-border-strong/60 gap-4 grid min-w-max">
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="primary">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="primary">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="primary">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="secondary">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="secondary">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="secondary">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="secondary">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="accent">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="accent">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="accent">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="accent">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="success">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="success">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="success">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="success">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="info">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="info">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="info">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="info">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="warning">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="warning">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="warning">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="warning">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="danger">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="danger">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="danger">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="danger">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="gray">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="neutral">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline" intent="neutral">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft" intent="neutral">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="neutral">Click Me</x-ui.button>
                    </div>
                    <div class="flex items-center gap-x-4">
                        <x-ui.button size="sm" intent="white" class="border border-border text-fg-title">Click
                            Me</x-ui.button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

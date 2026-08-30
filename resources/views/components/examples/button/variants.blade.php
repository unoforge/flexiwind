<div>
    <div class="grid grid-cols-[auto_minmax(0,1fr)] gap-4 overflow-hidden">
        <div class="grid text-sm text-muted-foreground mt-14 pl-3 sm:pl-0">
            <div>Primary</div>
            <div>Secondary</div>
            <div>Accent</div>
            <div>Success</div>
            <div>Destructive</div>
            <div>Neutral</div>
            <div>Gray</div>
        </div>
        <div class="grid overflow-hidden">
            <div data-invisible-scrollbar class="grid overflow-x-auto">
                <div class="grid grid-cols-4 gap-4 px-4 text-sm text-muted-foreground pb-3">
                    <div>Solid</div>
                    <div>Outline</div>
                    <div>Soft</div>
                    <div>Ghost</div>
                </div>
                <div class="p-4 rounded-md border border-border-strong/60 gap-4 grid min-w-max">
                    <div class="grid grid-cols-4 gap-4 items-center">
                        <x-ui.button size="sm">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost">Click Me</x-ui.button>
                    </div>
                    <div class="grid grid-cols-4 gap-4 items-center">
                        <x-ui.button size="sm" intent="secondary">Click Me</x-ui.button>
                        <span class="text-xs text-muted-foreground italic">—</span>
                        <x-ui.button size="sm" variant="soft" intent="primary">Click Me</x-ui.button>
                        <span class="text-xs text-muted-foreground italic">—</span>
                    </div>
                    <div class="grid grid-cols-4 gap-4 items-center">
                        <x-ui.button size="sm" intent="accent">Click Me</x-ui.button>
                        <span class="text-xs text-muted-foreground italic">—</span>
                        <span class="text-xs text-muted-foreground italic">—</span>
                        <span class="text-xs text-muted-foreground italic">—</span>
                    </div>
                    <div class="grid grid-cols-4 gap-4 items-center">
                        <x-ui.button size="sm" intent="success">Click Me</x-ui.button>
                        <span class="text-xs text-muted-foreground italic">—</span>
                        <x-ui.button size="sm" variant="soft" intent="success">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost" intent="success">Click Me</x-ui.button>
                    </div>
                    <div class="grid grid-cols-4 gap-4 items-center">
                        <x-ui.button size="sm" intent="destructive">Click Me</x-ui.button>
                        <span class="text-xs text-muted-foreground italic">—</span>
                        <x-ui.button size="sm" variant="soft" intent="destructive">Click Me</x-ui.button>
                        <span class="text-xs text-muted-foreground italic">—</span>
                    </div>
                    <div class="grid grid-cols-4 gap-4 items-center">
                        <x-ui.button size="sm" intent="neutral">Click Me</x-ui.button>
                        <span class="text-xs text-muted-foreground italic">—</span>
                        <span class="text-xs text-muted-foreground italic">—</span>
                        <span class="text-xs text-muted-foreground italic">—</span>
                    </div>
                    <div class="grid grid-cols-4 gap-4 items-center">
                        <x-ui.button size="sm" intent="gray">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="outline">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="soft">Click Me</x-ui.button>
                        <x-ui.button size="sm" variant="ghost">Click Me</x-ui.button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

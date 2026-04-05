<div class="max-w-md w-full">
    <x-ui.collapse
        :close-height="90"
        id="collapseMinHeight"
        class="w-full relative group"
    >
        <div
            class="rounded-md bg-bg-surface border border-border-input px-4 pt-4 pb-10 w-full h-full relative"
        >
            <div class="w-full flex flex-col space-y-3 overflow-hidden">
                <h4 class="font-semibold text-fg-title text-sm">Premium Wireless Headphones</h4>
                <p class="inline-flex text-fg-muted text-sm">
                    Experience crystal-clear audio with our premium noise-canceling headphones. Featuring 40-hour battery life, adaptive sound technology, and memory foam ear cushions for all-day comfort.
                </p>
                <p class="inline-flex text-fg-muted text-sm">
                    Includes: Carrying case, USB-C charging cable, airplane adapter, and 3.5mm audio cable. Compatible with iOS, Android, Windows, and macOS. 2-year warranty included.
                </p>
            </div>
        </div>
        <span
            class="absolute inset-x-0 h-8 bg-linear-to-t from-bg-muted flex -bottom-0.5 rounded-b-lg z-9 group-fx-open:hidden"
        ></span>
        <x-ui.collapse.trigger target="collapseMinHeight"
            class="btn btn-sm btn-solid btn-solid-neutral gap-2 text-bg rounded-ui text-sm w-max absolute bottom-4 group-fx-open:bottom-2 ease-linear duration-200 left-1/2 -translate-x-1/2 z-10"
        >
            Trigger Collapse
        </x-ui.collapse.trigger>
    </x-ui.collapse>
</div>
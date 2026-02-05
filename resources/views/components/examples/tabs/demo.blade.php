<x-ui.tabs class="w-full">
    <x-ui.tabs.list-wrapper class="mb-4">
        <x-ui.tabs.list class="pt-2 mb-2 border-b border-border flex items-center gap-5 text-fg-muted">
            <x-ui.tabs.trigger id="tab1" class="flex items-center pb-2.5 border-b-3 border-transparent fx-active:text-fg-title fx-active:border-fg-title">
                Tab Item 1
            </x-ui.tabs.trigger>
            <x-ui.tabs.trigger id="tab2" class="flex items-center pb-2.5 border-b-3 border-transparent fx-active:text-fg-title fx-active:border-fg-title">
                Tab Item 2
            </x-ui.tabs.trigger>
        </x-ui.tabs.list>
    </x-ui.tabs.list-wrapper>
    <x-ui.tabs.panel show-as-grid id="tab1" active>
        <h2 class="font-semibold text-fg-title">Tab 1 Content</h2>
        <p class="mt-1 text-fg-muted text-sm">This is the content for Tab 1.</p>
    </x-ui.tabs.panel>
    <x-ui.tabs.panel show-as-grid id="tab2">
        <h2 class="font-semibold text-fg-title">Tab 2 Content</h2>
        <p class="mt-1 text-fg-muted text-sm">This is the content for Tab 2.</p>
    </x-ui.tabs.panel>
</x-ui.tabs>

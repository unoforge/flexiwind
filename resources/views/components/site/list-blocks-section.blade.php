@props(['allBlocks'])



<section class="">
    <div class="mx-auto w-full lg:max-w-300 relative pt-20 border-dashed">
        <div aria-hidden="true" class="absolute inset-0 pointer-events-none">
            <div class="flex justify-between size-full max-w-300 mx-auto relative">
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <span
                    class="absolute -top-4.5 -left-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute -top-1 left-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute -top-4.5 right-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute -top-1 -right-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
            </div>
        </div>
        <x-atoms.site-section-header class="relative" subtitle="Just Ship It"
            title="Prebuilt Blocks for Real-World Laravel Applications"
            description="A growing collection of production-ready UI blocks designed for dashboards, SaaS products, marketing pages, and full application layouts.">

        </x-atoms.site-section-header>
        <x-ui.tabs class="flex flex-col w-full mt-16">
            <x-ui.tabs.list-wrapper
                class="-mt-1.5 px-3.5 sm:px-8 md:px-16 lg:px-8 xl:px-0 mx-auto w-full max-w-3xl lg:max-w-5xl overflow-auto flex items-center gap-2">
                <x-ui.tabs.list unStyled
                    class="h-9 bg-bg-muted/60 flex items-center w-max ui-card [--card-padding:--spacing(0.5)] [--card-radius:var(--radius-ui)]">
                    <x-ui.tabs.trigger unStyled id="tab-app-blocks" wrapper-class="flex h-full"
                        class="text-sm text-fg-muted fx-active:text-fg-title px-3 h-full flex items-center fx-active:bg-bg fx-active:ring-border/50 ring-1 ring-transparent inner-radius">
                        <span>

                        </span>
                        <span>
                            Application
                        </span>
                    </x-ui.tabs.trigger>
                    <x-ui.tabs.trigger unStyled is-disabled id="tab-marketing" wrapper-class="flex h-full"
                        class="text-sm text-fg-muted fx-active:text-fg-title px-3 h-full flex items-center fx-active:bg-bg fx-active:ring-border/50 ring-1 ring-transparent inner-radius">
                        <span>

                        </span>
                        <span>
                            Marketing
                        </span>
                    </x-ui.tabs.trigger>
                    <x-ui.tabs.trigger unStyled is-disabled id="tab-template" wrapper-class="flex h-full"
                        class="text-sm text-fg-muted fx-active:text-fg-title px-3 h-full flex items-center fx-active:bg-bg fx-active:ring-border/50 ring-1 ring-transparent inner-radius">
                        <span>

                        </span>
                        <span>
                            Template
                        </span>
                    </x-ui.tabs.trigger>
                </x-ui.tabs.list>
                <div class="flex items-center h-px relative flex-1 bg-linear-to-r from-border-strong/70">
                    <span class="size-2 rounded-ui bg-bg border border-border-strong/70"></span>
                </div>
            </x-ui.tabs.list-wrapper>
            <x-ui.tabs.panel-wrapper class="px-4 sm:px-6 lg:px-8 mt-14">
                <x-ui.tabs.panel id="tab-app-blocks">
                    <ul class="relative w-full grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-x-3.5 gap-y-6">
                        @foreach ($allBlocks['application'] as $blockKey => $block)
                            <li
                                class="h-full flex items-center group">
                                <x-blocks.block-card group="application" :key="$blockKey" :title="$block['title']" :illustrations="$block['illustrations']"/>
                            </li>
                        @endforeach
                        <div
                            class="absolute bottom-0 inset-x-0 pb-4 pt-12 h-24 bg-linear-to-t from-bg flex justify-center">
                            <x-ui.button href="/blocks" aria-label="Link to all blocks page" intent="neutral">
                                Browse All
                            </x-ui.button>
                        </div>
                    </ul>
                </x-ui.tabs.panel>
                <x-ui.tabs.panel id="tab-marketing">
                    <div
                        class="px-4 sm:px-6 md:px-14 py-8 sm:py-14 md:py-20 flex flex-col items-center justify-center relative border border-dashed border-border-strong">
                        <div class="size-20">

                        </div>
                        <h3>
                            Work in progress
                        </h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum autem cumque rem, reiciendis
                            harum quae sed placeat inventore
                        </p>
                    </div>
                </x-ui.tabs.panel>
                <x-ui.tabs.panel id="tab-template">
                    No template
                </x-ui.tabs.panel>
            </x-ui.tabs.panel-wrapper>
        </x-ui.tabs>
    </div>
</section>

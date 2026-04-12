<x-previews.hero-sections.01.navbar/>

<section>
    <div class="w-full flex items-center relative">
        <div
            class="min-h-max relative mx-auto pt-32 lg:pt-40 px-5 sm:px-10 md:px-12 lg:px-5 lg:max-w-7xl w-full text-center space-y-10">
            <a href="#"
                class="flex items-center gap-x-2 mx-auto w-max px-2 pr-1 py-1 rounded-full bg-bg-surface border border-border-strong/40 text-sm text-fg">
                mySto v2.1 is out
                <span class="pr-1">
                    <span class="iconify ph--caret-right text-sm flex"></span>
                </span>
            </a>
            <h1 class="mx-auto max-w-5xl font-semibold text-fg-title text-4xl/tight sm:text-5xl/tight lg:text-6xl/tight">
                The Tool that lets you have full control on your stock & sales
            </h1>
            <p class="mx-auto max-w-2xl text-fg">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt saepe atque enim quasi a ipsum
                asperiores necessitatibus deleniti, sint quo vel corporis dignissimos
            </p>
            <div class="flex flex-col items-center gap-5 w-full mx-auto max-w-md">
                <x-ui.input.group radius-none size="none" class="pl-6 w-full pr-0.5 py-0.5 gap-3 items-center rounded-full">
                    <x-ui.input variant="unstyled" type="email" name="email" id="email" placeholder="johndoe@gmail.com"
                        class="w-full flex-1"/>
                    <x-ui.button radius-none aria-label="sign up" 
                        class="min-w-max rounded-full relative overflow-hidden duration-300 ease-linear">
                        <span>
                            Try for free
                        </span>
                    </x-ui.button>
                </x-ui.input.group>
                <span class="text-center text-sm text-fg-muted inline-flex items-center">
                    Powerfull, AI Integreted <span class="iconify ph--sparkle inline-flex"></span>
                </span>
            </div>
            <div
                class="mx-auto max-w-6xl aspect-[5/2.3] overflow-hidden bg-fg-title  ui-card [--card-radius:20px] [--card-padding:--spacing(3)] rounded-b-none pb-0">
                <img src="/images/dash-light.webp" width="1440" height="1024" alt="product image"
                    class="inner-radius w-full h-auto dark:hidden" loading="eager" decoding="async"
                    fetchpriority="high">
                <img src="/images/dash-dark.webp" width="1440" height="1024" alt="product image"
                    class="inner-radius w-full h-auto hidden dark:flex" loading="eager" decoding="async"
                    fetchpriority="high">
            </div>
        </div>
    </div>
</section>

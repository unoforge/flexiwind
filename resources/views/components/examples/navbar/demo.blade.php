<header class="absolute left-0 top-0 w-full flex items-center h-24 z-40">
    <nav
        class="relative mx-auto lg:max-w-7xl w-full flex gap-x-5 px-5 sm:px-10 md:px-12 lg:px-5 justify-between items-center">
        <div class="flex items-center min-w-max relative">
            <a href="#" class="font-semibold flex items-center gap-x-2">
                <span class="text-lg text-fg">App name</span>
            </a>
        </div>

        <div x-data x-navbar id="app-navbar"
            class="fixed inset-x-0 h-dvh lg:h-max bg-bg lg:bg-transparent top-0 -translate-y-10 opacity-0 invisible lg:visible  lg:translate-y-0 lg:opacity-100 fx-open:opacity-100 fx-open:visible fx-open:translate-y-0 left-0 w-full lg:top-0 lg:relative  lg:flex lg:justify-between duration-300 ease-linear py-16 lg:py-0 px-5 sm:px-10 md:px-12 lg:px-0">
            <ul class="flex text-fg flex-col lg:flex-row gap-6 lg:items-center lg:w-full lg:pl-10">
                <li>
                    <a href="#" class="relative py-2.5 duration-300 ease-linear hover:text-primary">Features</a>
                </li>
                <li>
                    <a href="#" class="relative py-2.5 duration-300 ease-linear hover:text-primary">Company</a>
                </li>
                <li>
                    <a href="#" class="relative py-2.5 duration-300 ease-linear hover:text-primary">Plateform</a>
                </li>
                <li>
                    <a href="#" class="relative py-2.5 duration-300 ease-linear hover:text-primary">Resources</a>
                </li>
                <li>
                    <a href="#" class="relative py-2.5 duration-300 ease-linear hover:text-primary">Contact</a>
                </li>
            </ul>
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 lg:min-w-max mt-10 lg:mt-0">
                <x-ui.button variant="ghost" class="justify-center w-full sm:w-max rounded-full">
                    Login
                </x-ui.button>
                <x-ui.button intent="neutral" class="justify-center w-full sm:w-max rounded-full">
                    Sign-up
                </x-ui.button>
            </div>
        </div>
        <div class="flex items-center lg:hidden border-l border-border-strong pl-1.5">
            <x-ui.button data-nav-trigger data-toggle-nav="app-navbar" variant="ghost" size="none"
                class="flex-col relative py-3 px-1.5 group" aria-label="Toggle navbar">
                <div id="line-1" aria-hidden="true"
                    class="h-0.5 w-6 rounded transition duration-300 bg-fg in-aria-expanded:rotate-45 in-aria-expanded:translate-y-1.5">
                </div>
                <div id="line-2" aria-hidden="true"
                    class="mt-2 h-0.5 w-6 rounded transition duration-300 bg-fg in-aria-expanded:-rotate-45 in-aria-expanded:-translate-y-1">
                </div>
            </x-ui.button>
        </div>
    </nav>
</header>

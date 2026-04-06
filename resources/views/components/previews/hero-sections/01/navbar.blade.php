<div data-nav-overlay data-navbar-id="app-nav" aria-hidden="true"
    class="fixed invisible fx-open:visible inset-0 lg:hidden bg-gray-800/60 backdrop-blur-xl z-30">
</div>

<header class="absolute left-0 top-0 w-full flex items-center h-24 z-40">
    <nav
        class="relative mx-auto lg:max-w-7xl w-full flex gap-x-5 px-5 sm:px-10 md:px-12 lg:px-5 justify-between items-center">
        <div class="flex items-center min-w-max relative">
            <a href="#" class="font-semibold flex items-center gap-x-2">
                <svg aria-hidden="true" width="488" height="488" class="size-8" viewBox="0 0 488 488"
                    fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_13_164)">
                        <path
                            d="M71.5342 71L416.602 416.068V416.068C321.314 511.356 166.822 511.356 71.5342 416.068V416.068C-23.7537 320.78 -23.7537 166.288 71.5342 71V71Z"
                            fill="currentColor" class="text-fg-title"></path>
                        <path
                            d="M483.659 249.5C483.659 274.629 436.788 344.5 411.659 344.5C386.53 344.5 392.659 274.629 392.659 249.5C392.659 224.371 413.03 204 438.159 204C463.288 204 483.659 224.371 483.659 249.5Z"
                            fill="currentColor" class="text-fg-title"></path>
                        <circle cx="243.429" cy="243.759" r="110" transform="rotate(48.3973 243.429 243.759)"
                            fill="black" stroke="white" stroke-width="80" class="fill-fg-title stroke-bg">
                        </circle>
                        <path
                            d="M309 71C309 96.129 212.629 101 187.5 101C162.371 101 142 80.629 142 55.5C142 30.371 162.371 10 187.5 10C212.629 10 309 45.871 309 71Z"
                            fill="currentColor" class="text-fg-title"></path>
                        <path
                            d="M417 101.5C417 126.629 415.129 215.5 390 215.5C364.871 215.5 326 126.629 326 101.5C326 76.371 346.371 56 371.5 56C396.629 56 417 76.371 417 101.5Z"
                            fill="currentColor" class="text-fg-title"></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_13_164">
                            <rect width="488" height="488" fill="currentColor" class="text-bg"></rect>
                        </clipPath>
                    </defs>
                </svg>
                <span class="text-lg text-fg">mySto</span>
            </a>
        </div>

        <div id="app-nav" x-data x-navbar
            class="fixed inset-x-0 h-dvh lg:h-max bg-bg lg:bg-transparent top-0 -translate-y-10 opacity-0 invisible lg:visible  lg:translate-y-0 lg:opacity-100 fx-open:opacity-100 fx-open:visible fx-open:translate-y-0 left-0 w-full lg:top-0 lg:relative  lg:flex lg:justify-between duration-300 ease-linear py-32 lg:py-0 px-5 sm:px-10 md:px-12 lg:px-0">
            <ul class="flex text-fg flex-col lg:flex-row gap-6 lg:items-center lg:w-full lg:pl-10">
                <li class="">
                    <a href="#"
                        class="relative py-2.5 duration-300 ease-linear hover:text-primary">Features</a>
                </li>
                <li class="">
                    <a href="#"
                        class="relative py-2.5 duration-300 ease-linear hover:text-primary">Company</a>
                </li>
                <li class="">
                    <a href="#"
                        class="relative py-2.5 duration-300 ease-linear hover:text-primary">Plateform</a>
                </li>
                <li class="">
                    <a href="#"
                        class="relative py-2.5 duration-300 ease-linear hover:text-primary">Resources</a>
                </li>
                <li class="">
                    <a href="#"
                        class="relative py-2.5 duration-300 ease-linear hover:text-primary">Contact</a>
                </li>
            </ul>
            <div class="flex flex-col sm:flex-row sm:items-center gap-4 lg:min-w-max mt-10 lg:mt-0">
                <x-ui.button href="#" variant="ghost" :radius="false"
                    class="justify-center w-full sm:w-max rounded-full">
                    Login
                </x-ui.button>
                <x-ui.button href="#" intent="neutral" :radius="false"
                    class=" justify-center w-full sm:w-max rounded-full">
                    Sign-up
                </x-ui.button>
            </div>
        </div>
        <div class="flex items-center lg:hidden">
            <button data-nav-trigger data-toggle-nav="app-nav"
                class="focus:outline-none pl-3 relative py-3 bg-transparent border-l border-border-strong group">
                <span class="sr-only">Toggle navbar</span>
                <div id="line-1" aria-hidden="true"
                    class="h-0.5 w-6 rounded transition duration-300 bg-fg in-aria-expanded:rotate-45 in-aria-expanded:translate-y-1.5">
                </div>
                <div id="line-2" aria-hidden="true"
                    class="mt-2 h-0.5 w-6 rounded transition duration-300 bg-fg in-aria-expanded:-rotate-45 in-aria-expanded:-translate-y-1">
                </div>
            </button>
        </div>
    </nav>
</header>

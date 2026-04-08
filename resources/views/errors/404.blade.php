<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }} - Page Not Found</title>
    <script>
         (function() {
            const sessionTheme = document.documentElement.dataset.theme;
            const localTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

            let isDark = false;
            if (sessionTheme) {
                isDark = sessionTheme === 'dark';
            } else if (localTheme) {
                isDark = localTheme === 'dark';
            } else {
                isDark = systemPrefersDark;
            }

            document.documentElement.classList.toggle('dark', isDark);
        })();
    </script>
    @livewireStyles
    @vite(['resources/css/site-font.css', 'resources/css/app.css'])
</head>

<body class="antialiased bg-bg">
    <x-organisms.navbar />
    <main class="">
    <section class="relative">
        <span aria-hidden="true" class="absolute bottom-4 h-4 inset-x-0 flex pointer-events-none">
            <div class="xl:max-w-480 flex flex-col justify-between h-4 w-full mx-auto">
                <span class="h-px bg-linear-to-l from-border-strong to-border/70"></span>
                <span class="h-px bg-linear-to-r from-border-strong to-border/70"></span>
            </div>
        </span>
        <div aria-hidden="true" class="absolute inset-0 -top-20 pointer-events-none">
            <div class="flex justify-between size-full max-w-340 mx-auto relative">
                <div aria-hidden="true"
                    class="absolute inset-x-0 bottom-8 top-14 flex noise-subtle opacity-60 dark:opacity-50"></div>
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <div class="relative h-full w-4 border-x border-pattern-fg/70 linear-gradient-pattern"></div>
                <span
                    class="absolute top-8.5 -left-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute top-12.5 left-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute top-8.5 -right-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>
                <span
                    class="absolute top-12.5 right-[11px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>

                <span
                    class="absolute bottom-7 -left-[3.5px] size-2 bg-bg border border-border-strong/60 shadow-sm rounded-ui"></span>

                <svg width="401" height="401" viewBox="0 0 401 401" fill="none"
                    class="absolute right-4 size-40 md:size-56 lg:size-64 top-13.5" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M0 0H401V401H291.912C257.067 401 232.196 365.878 238.503 331.609C246.986 285.517 249.519 227.824 220 195.989C187.027 160.428 121.321 164.958 70.2625 175.681C35.8141 182.915 0 157.979 0 122.78V0Z"
                        fill="#F5F0F0" class="fill-bg-muted/40" />
                </svg>


            </div>
        </div>
        <div class="min-h-[calc(100dvh-4rem)] relative z-5 flex flex-col justify-center px-3.5 sm:px-4 pt-16 md:pt-20 pb-20 md:pb-28">
            <div class="sm:max-w-4xl sm:mx-auto w-full">
                <h1
                    class="font-bold text-3xl sm:text-4xl/tight md:text-5xl/[1.2] max-w-xl text-balance text-transparent bg-clip-text bg-linear-to-br from-fg-title to-fg-muted/60 dark:via-fg">
                    404
                </h1>
                <p class="max-w-md text-fg-muted text-sm md:text-base mt-6.5">
                    Oops, the page you're looking for is not found
                </p>
                <div class="flex flex-wrap gap-3 mt-9">
                    <x-ui.button href="/" intent="neutral" size="sm" class="sm:btn-md">
                        <span aria-hidden="true" class="iconify ph--house opacity-80 mr-2 size-3.5"></span>
                        Go back home
                    </x-ui.button>
                </div>
            </div>
        </div>
    </section>
</main>
    <x-blocks.modal-search />
    @livewireScripts
    @vite(['resources/js/app.js', 'resources/js/site-ui.js', 'resources/js/search.js'])

</body>

</html>

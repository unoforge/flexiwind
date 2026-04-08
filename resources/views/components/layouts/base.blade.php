@props([
    'seo' => [],
    'bodyClass' => '',
    'styleEntries' => ['resources/css/site-font.css', 'resources/css/app.css'],
    'scriptEntries' => ['resources/js/app.js'],
])

<!doctype html>
<html lang="en" class="bg-bg" data-palette="default">

<head>
    <x-molecules.seo :seo="$seo">
        {{-- <link rel="sitemap" href="/sitemap-index.xml" /> --}}
    </x-molecules.seo>

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
    @vite($styleEntries)
    {{ $head ?? '' }}
</head>

<body x-data class="min-h-screen overflow-hidden overflow-y-auto {{ $bodyClass }} font-sans">
    {{ $slot }}
    @livewireScripts
    @vite($scriptEntries)

    @if (!config('app.debug'))
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-Z4F5SD3FZ5"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'G-Z4F5SD3FZ5');
        </script>
    @endif
</body>

</html>

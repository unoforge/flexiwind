@props(['class'=>''])

<!doctype html>
<html lang="en" class="bg-bg" data-palette="default">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Flexiwind Block</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <meta name="description" content="Blocks for Laravel + Tailwind v4" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

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
    @vite(['resources/css/app.css'])
    {{ $head ?? '' }}
</head>

<body x-data class="min-h-screen font-sans {{ $class }}">
    {{ $slot }}
    @livewireScripts
    @vite(['resources/js/app.js', 'resources/js/flexilla.js'])
</body>

</html>

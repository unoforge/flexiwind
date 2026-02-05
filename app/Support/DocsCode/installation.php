<?php

return [
    'flexilla-all' => [
        'lang' => 'css',
        'name' => 'Shell',
        'code' => 'npm i @flexilla/flexilla'
    ],
    'flexilla-accordion' => [
        'lang' => 'css',
        'name' => 'Shell',
        'code' => 'npm i @flexilla/accordion'
    ],
    'flexilla-accordion-alpine' => [
        'lang' => 'css',
        'name' => 'Shell',
        'code' => 'npm i @flexilla/alpine-accordion'
    ],
    'install-dark-mode-blade' => [
        'lang' => 'css',
        'name' => 'Shell',
        'code' => 'npm i @flexilla/utilities'
    ],
    'theme-toggle-button' => [
        'lang'=>'blade',
        'name'=>'theme-toggle.blade.php',
        'code'=><<<'HTML'
<x-ui.button variant="ghost" size="sm" iconOnly radius="none" x-on:click="$store.theme.toggle()"
    aria-label="toggle theme" class="rounded-global relative">
    <span
        class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--sun invisible dark:visible"></span>
    <span
        class="absolute top-1/2 -translate-1/2 left-1/2 ease-linear duration-200 iconify ph--moon-stars visible dark:invisible"></span>
</x-ui.button>  
HTML
    ],

    'theme-alpine-head' => [
        'lang' => 'html',
        'name' => 'HTML',
        'code' => <<<'HTML'
<head>
    <!-- Other head content -->
     <script>
        (function(){const s=document.documentElement,d=s.dataset.theme,l=localStorage.getItem('theme'),m=window.matchMedia('(prefers-color-scheme: dark)').matches;s.classList.toggle('dark',d?d==='dark':l?l==='dark':m)})();
    </script>
</head>
HTML
    ],
    'theme-vanilla-init-head' => [
        'lang' => 'html',
        'name' => 'HTML',
        'code' => <<<'HTML'
<head>
    <!-- Other head content -->
     <script>
      !(function () { try {var e = "flexilla-theme", t = localStorage.getItem(e) || "system",c = window.matchMedia("(prefers-color-scheme: dark)").matches  ? "dark"  : "light",r = "system" === t ? c : t,a = document.documentElement;(a.classList.toggle("dark", "dark" === r), a.setAttribute("data-theme", r), (a.style.colorScheme = r));} catch (e) {}})();
    </script>
</head>
HTML
    ],
    'theme-usage' => [
        'lang' => 'javascript',
        'name' => 'JavaScript',
        'code' => <<<'JS'
import { flexiTheme } from '@flexilla/utilities'

const theme = flexiTheme()
// init theme
theme.initTheme()

// set theme : dark, light, system
theme.setTheme("dark")
JS
    ],
    'theme-alpine' => [
        'lang' => 'javascript',
        'name' => 'JavaScript',
        'code' => <<<'JS'
import { disableTransitionsTemporarily } from "@flexilla/utilities";

document.addEventListener("alpine:init", () => {
    Alpine.store("theme", {
        isDark: false,
        init() {
            const localTheme = localStorage.getItem("theme");
            const systemPrefersDark = window.matchMedia(
                "(prefers-color-scheme: dark)"
            ).matches;

            if (localTheme) {
                this.isDark = localTheme === "dark";
            } else {
                this.isDark = systemPrefersDark;
            }

            this.updateTheme();
            window
                .matchMedia("(prefers-color-scheme: dark)")
                .addEventListener("change", (e) => {
                    if (!localStorage.getItem("theme")) {
                        this.isDark = e.matches;
                        this.updateTheme();
                    }
                });

            document.addEventListener("livewire:navigated", () => {
                disableTransitionsTemporarily(() => {
                    document.documentElement.classList.toggle(
                        "dark",
                        this.isDark
                    );
                });
            });
        },

        toggle() {
            this.isDark = !this.isDark;
            this.updateTheme();
        },

        setToDark() {
            this.isDark = true;
            this.updateTheme();
        },

        setToLight() {
            this.isDark = false;
            this.updateTheme();
        },

        updateTheme() {
            disableTransitionsTemporarily(() => {
                document.documentElement.classList.toggle("dark", this.isDark);
                localStorage.setItem("theme", this.isDark ? "dark" : "light");
                window.dispatchEvent(new CustomEvent("theme-changed", {
                    detail: { theme: this.isDark ? "dark" : "light", isDark: this.isDark }
                }));
            });
        },
    });
});

document.addEventListener("livewire:navigated", () => {
    const theme =
        localStorage.getItem("theme") ||
        (window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light");
    document.documentElement.classList.toggle("dark", theme === "dark");
});

window.toggleTheme = function () {
    const currentTheme =
        localStorage.getItem("theme") ||
        (document.documentElement.classList.contains("dark")
            ? "dark"
            : "light");
    const newTheme = currentTheme === "dark" ? "light" : "dark";

    localStorage.setItem("theme", newTheme);
    document.documentElement.classList.toggle("dark", newTheme === "dark");
    window.dispatchEvent(
        new CustomEvent("theme-changed", {
            detail: { theme: newTheme },
        })
    );
};
JS
    ],
];

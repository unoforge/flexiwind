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
    aria-label="toggle theme" class="relative">
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
    !(function () {
        try{const k="flexilla-theme",l="theme",s=localStorage.getItem(k)||localStorage.getItem(l)||"system",m=window.matchMedia("(prefers-color-scheme: dark)").matches?"dark":"light",r=s==="system"?m:s,d=document.documentElement;d.classList.toggle("dark",r==="dark");d.setAttribute("data-theme",r);d.style.colorScheme=r}catch(_){}
    })();
    </script>
</head>
HTML
    ],
    'theme-usage' => [
        'lang' => 'javascript',
        'name' => 'JavaScript',
        'code' => <<<'JS'
import { flexiTheme } from "@flexilla/utilities";
const theme = flexiTheme({
  storageKey: "flexilla-theme",
  initialTheme: "system",
});
theme.initTheme();
JS
    ],
    'theme-alpine' => [
        'lang' => 'javascript',
        'name' => 'JavaScript',
        'code' => <<<'JS'
import { disableTransitionsTemporarily } from "@flexilla/utilities";

document.addEventListener("alpine:init", () => {
    Alpine.store("theme", {
        preference: "system",
        isDark: false,

        init() {
            this.preference = localStorage.getItem("theme") || "system";

            window
                .matchMedia("(prefers-color-scheme: dark)")
                .addEventListener("change", () => {
                    if (this.preference === "system") {
                        this.updateState();
                    }
                });

            document.addEventListener("livewire:navigated", () => {
                this.applyToDom();
            });

            this.updateState();
        },
        setTheme(mode) {
            this.preference = mode;

            if (mode === "system") {
                localStorage.removeItem("theme");
            } else {
                localStorage.setItem("theme", mode);
            }

            this.updateState();
        },
        toggle() {
            const nextMode = this.isDark ? "light" : "dark";
            this.setTheme(nextMode);
        },
        updateState() {
            const systemPrefersDark = window.matchMedia(
                "(prefers-color-scheme: dark)",
            ).matches;

            if (this.preference === "system") {
                this.isDark = systemPrefersDark;
            } else {
                this.isDark = this.preference === "dark";
            }

            this.applyToDom();
        },
        applyToDom() {
            disableTransitionsTemporarily(() => {
                this._syncDom();
            });
        },
        _syncDom() {
            document.documentElement.classList.toggle("dark", this.isDark);
            window.dispatchEvent(
                new CustomEvent("theme-changed", {
                    detail: {
                        preference: this.preference,
                        isDark: this.isDark,
                    },
                }),
            );
        },
    });
});

JS
    ],
];

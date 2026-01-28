import copyToClipboardComponent from "./copyToClipboard";

import { docSearch } from "../data/search-db";
import { disableTransitionsTemporarily } from "./utils";

const initGlobalApp = () => {};

initGlobalApp();



Alpine.data("copyToClipboard", copyToClipboardComponent);

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
    Alpine.data("searchDocs", () => ({
        query: "",
        results: [],

        search() {
            if (this.query.trim().length < 1) {
                this.results = [];
                return;
            }

            const q = this.query.toLowerCase();
            this.results = docSearch.filter(
                (item) =>
                    item.title.toLowerCase().includes(q) ||
                    item.description.toLowerCase().includes(q) ||
                    item.category.toLowerCase().includes(q)
            );
        },

        clearSearch() {
            this.query = "";
            this.results = [];
        },
    }));
});

document.addEventListener("livewire:navigated", () => {
    const theme =
        localStorage.getItem("theme") ||
        (window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light");
    document.documentElement.classList.toggle("dark", theme === "dark");
    initGlobalApp();
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

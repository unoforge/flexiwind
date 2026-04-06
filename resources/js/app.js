import '@fontsource/geist-sans';



import copyToClipboardComponent from "./copyToClipboard";

import { docSearch } from "../data/search-db";
import { disableTransitionsTemporarily } from "@flexilla/utilities/dom-utilities";

Alpine.data("copyToClipboard", copyToClipboardComponent);

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
                    item.category.toLowerCase().includes(q),
            );
        },

        clearSearch() {
            this.query = "";
            this.results = [];
        },
    }));
});

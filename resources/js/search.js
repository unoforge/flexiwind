import { docSearch } from "../data/search-db";

document.addEventListener("alpine:init", () => {
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

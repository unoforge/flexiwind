/**
 * Fichiers Flexiwind : <x-ui.file-trigger> et <x-ui.dropzone>.
 *
 * Deux inputs : `picker`, ouvert par le bouton ou la zone, et `model`, que
 * lisent Livewire (wire:model) ou le formulaire (`name`). Un choix est
 * vérifié ici (type, taille, nombre) puis seuls les fichiers acceptés sont
 * copiés dans `model` : Livewire n'envoie jamais un fichier refusé.
 *
 * Ces vérifications aident ; le serveur valide à nouveau (`mimes`, `max`),
 * car ce qu'envoie un navigateur peut être forgé.
 */

export function FilesPlugin(Alpine) {
    Alpine.data("fwFiles", files);
}

let sequence = 0;

function fill(text, values) {
    return Object.entries(values).reduce((result, [key, value]) => result.replaceAll(`:${key}`, value), text ?? "");
}

export function humanSize(bytes) {
    const units = [["GB", 1024 ** 3], ["MB", 1024 ** 2], ["KB", 1024]];

    for (const [unit, size] of units) {
        if (bytes >= size) {
            const value = bytes / size;

            return `${Number(value.toFixed(value < 10 ? 1 : 0))} ${unit}`;
        }
    }

    return `${bytes} B`;
}

/** Le fichier correspond-il à `accept` (`.pdf`, `image/*`, `application/pdf`) ? */
export function accepts(file, accept) {
    if (!accept?.length) {
        return true;
    }

    const name = file.name.toLowerCase();
    const type = (file.type || "").toLowerCase();

    return accept.some((rule) => {
        if (rule.startsWith(".")) {
            return name.endsWith(rule);
        }

        if (rule.endsWith("/*")) {
            return type.startsWith(rule.slice(0, -1));
        }

        return type === rule;
    });
}

function files(config = {}) {
    const texts = config.texts ?? {};
    const previews = new Set();

    return {
        files: [],
        over: false,
        depth: 0,

        init() {
            // Le serveur vide la propriété (après un enregistrement) : la liste suit.
            if (this.livewire() && typeof this.$wire.$watch === "function") {
                this.$wire.$watch(config.model, (value) => {
                    const empty = value === null || value === undefined || (Array.isArray(value) && value.length === 0);
                    const settled = this.files.every((row) => row.rejected || row.status === "done" || row.status === "error");

                    if (empty && settled) {
                        this.clearPreviews();
                        this.files = [];
                    }
                });
            }
        },

        destroy() {
            previews.forEach((url) => URL.revokeObjectURL(url));
        },

        // ------------------------------------------------------------ ouverture

        browse() {
            if (this.$refs.picker.disabled) {
                return;
            }

            this.$refs.picker.value = "";
            this.$refs.picker.click();
        },

        /** Un clic sur le bouton du slot ouvre le sélecteur. */
        openFrom(event) {
            const trigger = event.target.closest("button, a, [role=button]");

            if (trigger && !trigger.disabled) {
                event.preventDefault();
                this.browse();
            }
        },

        dragEnter(event) {
            if (this.$refs.picker.disabled || !event.dataTransfer?.types?.includes("Files")) {
                return;
            }

            this.depth += 1;
            this.over = true;
        },

        dragLeave() {
            this.depth = Math.max(0, this.depth - 1);
            this.over = this.depth > 0;
        },

        drop(event) {
            this.depth = 0;
            this.over = false;

            if (!this.$refs.picker.disabled) {
                this.pick(event.dataTransfer?.files ?? []);
            }
        },

        // ------------------------------------------------------------ choix

        pick(list) {
            let picked = [...list];

            if (!config.multiple) {
                picked = picked.slice(0, 1);
            }

            this.clearPreviews();

            let accepted = 0;
            const rows = picked.map((file) => {
                let reason = null;

                if (!accepts(file, config.accept)) {
                    reason = texts.type;
                } else if (config.maxBytes && file.size > config.maxBytes) {
                    reason = fill(texts.size, { max: config.maxLabel });
                } else if (config.maxFiles && accepted >= config.maxFiles) {
                    reason = fill(texts.count, { max: config.maxFiles });
                } else {
                    accepted += 1;
                }

                return this.row(file, reason);
            });

            // Un nouveau choix remplace le précédent, comme un input natif.
            this.files = rows;
            this.commit();
        },

        row(file, reason) {
            let preview = null;

            if (!reason && file.type.startsWith("image/") && file.size < 15 * 1024 * 1024) {
                preview = URL.createObjectURL(file);
                previews.add(preview);
            }

            return {
                id: ++sequence,
                file,
                name: file.name,
                size: file.size,
                preview,
                rejected: !!reason,
                reason,
                status: reason ? "rejected" : this.livewire() ? "uploading" : "ready",
                progress: 0,
            };
        },

        /** Copie les fichiers acceptés dans l'input lu par Livewire ou le formulaire. */
        commit() {
            const transfer = new DataTransfer();
            this.files.filter((row) => !row.rejected).forEach((row) => transfer.items.add(row.file));

            const model = this.$refs.model;
            model.files = transfer.files;

            if (!this.livewire()) {
                return;
            }

            if (!transfer.files.length) {
                this.$wire?.$set(config.model, config.multiple ? [] : null);

                return;
            }

            this.listen(model);
            model.dispatchEvent(new Event("change", { bubbles: true }));
        },

        livewire() {
            return !!config.model && !!this.$wire;
        },

        /** Les événements d'envoi de Livewire, posés une fois sur l'input. */
        listen(model) {
            if (model._fwListening) {
                return;
            }

            model._fwListening = true;
            const uploading = () => this.files.filter((row) => !row.rejected && row.status !== "done");

            model.addEventListener("livewire-upload-start", () => uploading().forEach((row) => { row.status = "uploading"; row.progress = 0; }));
            model.addEventListener("livewire-upload-progress", (event) => uploading().forEach((row) => { row.progress = event.detail?.progress ?? row.progress; }));
            model.addEventListener("livewire-upload-finish", () => uploading().forEach((row) => { row.status = "done"; row.progress = 100; }));
            model.addEventListener("livewire-upload-error", () => uploading().forEach((row) => { row.status = "error"; }));
            model.addEventListener("livewire-upload-cancel", () => uploading().forEach((row) => { row.status = "error"; }));
        },

        // ------------------------------------------------------------ retrait

        remove(target) {
            const kept = this.files.filter((row) => row !== target && !row.rejected);
            const index = this.files.filter((row) => !row.rejected).indexOf(target);

            if (target.preview) {
                URL.revokeObjectURL(target.preview);
                previews.delete(target.preview);
            }

            this.files = this.files.filter((row) => row !== target);

            if (target.rejected) {
                return;
            }

            const transfer = new DataTransfer();
            kept.forEach((row) => transfer.items.add(row.file));
            this.$refs.model.files = transfer.files;

            if (this.livewire()) {
                this.removeUpload(index);
            }
        },

        /** Retire le fichier déjà envoyé à Livewire, sans renvoyer les autres. */
        removeUpload(index) {
            const current = this.$wire.get(config.model);
            const values = Array.isArray(current) ? current : current ? [current] : [];
            // « livewire-file:<signature>:<nom> » : le nom temporaire est la dernière partie.
            const name = typeof values[index] === "string" && values[index].startsWith("livewire-file:") ? values[index].split(":").pop() : null;

            if (name && config.multiple) {
                this.$wire.removeUpload(config.model, name);
            } else {
                this.$wire.$set(config.model, config.multiple ? [] : null);
            }
        },

        clearPreviews() {
            previews.forEach((url) => URL.revokeObjectURL(url));
            previews.clear();
        },

        // ------------------------------------------------------------ textes

        meta(row) {
            const size = humanSize(row.size);

            if (row.rejected) {
                return `${size} · ${row.reason}`;
            }

            return fill(texts[row.status] ?? texts.ready, { size, progress: Math.round(row.progress) });
        },

        removeLabel(row) {
            return fill(texts.remove, { name: row.name });
        },
    };
}

#!/usr/bin/env node
/**
 * Assemble manifests/*.json en registry.json, le fichier que lit le CLI.
 *
 *   node bin/build-registry.mjs
 *
 * manifests/ range les items par famille (components, blocks, marketing,
 * base, themes) ; registry.json les met bout à bout. Ensuite :
 *
 *   php artisan flexi:build --schema=../flexiwind/registry.json --output=../flexiwind/registries --override
 *
 * (depuis flexiwind-pro, `npm run build:registry` enchaîne les deux.)
 */

import { existsSync, readdirSync, readFileSync, writeFileSync } from "node:fs";
import { dirname, join } from "node:path";
import { fileURLToPath } from "node:url";

const root = join(dirname(fileURLToPath(import.meta.url)), "..");
const manifests = join(root, "manifests");

// L'ordre de registry.json ; un nouveau fichier de manifests/ passe à la suite.
const ORDER = ["components", "blocks", "marketing", "base", "themes"];

const files = readdirSync(manifests)
    .filter((file) => file.endsWith(".json"))
    .map((file) => file.slice(0, -5))
    .sort((a, b) => (ORDER.indexOf(a) + 1 || 99) - (ORDER.indexOf(b) + 1 || 99) || a.localeCompare(b));

const components = [];
const seen = new Map();
const errors = [];

for (const name of files) {
    const manifest = JSON.parse(readFileSync(join(manifests, `${name}.json`), "utf8"));

    for (const item of manifest.components ?? []) {
        if (seen.has(item.name)) {
            errors.push(`« ${item.name} » est déclaré dans ${seen.get(item.name)}.json et ${name}.json`);
            continue;
        }

        seen.set(item.name, name);

        for (const file of item.files ?? []) {
            if (!existsSync(join(root, file.path))) {
                errors.push(`${name}.json › ${item.name} : source absente (${file.path})`);
            }
        }

        components.push(item);
    }
}

if (errors.length) {
    errors.forEach((error) => console.error(`✗ ${error}`));
    process.exit(1);
}

const registry = {
    name: "flexiwind-ui",
    title: "Flexiwind UI",
    description: "Flexiwind UI components and blocks for Laravel Blade and Livewire.",
    homepage: "https://flexiwind.unoforge.com",
    author: "Johnkat MJ <johnkatembue4@gmail.com>",
    components,
};

writeFileSync(join(root, "registry.json"), JSON.stringify(registry, null, 4) + "\n");
console.log(`registry.json : ${components.length} items (${files.map((name) => `${name}.json`).join(", ")})`);

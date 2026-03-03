import fs from "fs";
import path from "path";

function build() {
    const root = process.cwd();
    const componentsPath = path.join(root, "registries", "components.json");
    // const chartPath = path.join(root, "registries", "chart.json");
    const blocksPath = path.join(root, "registries", "blocks.json");
    const outPath = path.join(root, "registry.json");

    function readJsonSync(p) {
        try {
            const raw = fs.readFileSync(p, "utf8");
            return JSON.parse(raw);
        } catch (err) {
            console.error(`Failed to read/parse JSON at ${p}:`, err);
            process.exit(1);
        }
    }

    const components = readJsonSync(componentsPath);
    const blocks = readJsonSync(blocksPath);

    const finalRegistry = {
        name: "flexiwind-ui",
        title: "Flexiwind UI",
        description: "Flexiwind UI components and blocks for Laravel Blade and Livewire.",
        homepage: "https://flexiwind.laravel.com",
        author: "Johnkat MJ <johnkatembue4@gmail.com>",
        components: [
            ...(components && components.components ? components.components : []),
            ...(blocks && blocks.components ? blocks.components : []),
        ],
    };

    try {
        fs.writeFileSync(
            outPath,
            JSON.stringify(finalRegistry, null, 2),
            "utf8",
        );
        console.log(`Wrote registry to ${outPath}`);
    } catch (err) {
        console.error(`Failed to write registry to ${outPath}:`, err);
        process.exit(1);
    }
}

build();

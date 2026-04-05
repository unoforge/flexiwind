import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

// Fix __dirname in ESM
const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

const ROOT_DIR = path.resolve(__dirname, '../resources/registries');
const OUTPUT_FILE = path.resolve(__dirname, '../config/registry.php');

function scanDir(dir) {
  const results = [];
  const list = fs.readdirSync(dir);

  for (const file of list) {
    if (file.startsWith('.')) continue;

    const fullPath = path.join(dir, file);
    const stat = fs.statSync(fullPath);

    // Only include JSON files at root level
    if (stat.isFile() && path.extname(file) === '.json') {
      results.push({
        name: path.basename(file, '.json'),
        // Path relative to ROOT_DIR, not __dirname
        path: path.relative(ROOT_DIR, fullPath).replace(/\\/g, '/'),
      });
    }
  }

  return results;
}

function buildRegistryMap(files) {
  const registry = {};

  for (const file of files) {
    if (registry[file.name]) {
      throw new Error(`Duplicate block name: "${file.name}"`);
    }
    registry[file.name] = file.path;
  }

  return registry;
}

function toPhpArray(obj) {
  const entries = Object.entries(obj).map(
    ([key, value]) => `    '${key}' => '${value}'`
  );

  return `<?php

return [
${entries.join(',\n')}
];
`;
}

function main() {
  console.log('🔍 Scanning...');

  const files = scanDir(ROOT_DIR);
  const registry = buildRegistryMap(files);

  const phpContent = toPhpArray(registry);

  fs.writeFileSync(OUTPUT_FILE, phpContent, 'utf-8');

  console.log('✅ Done:', OUTPUT_FILE);
}

main();
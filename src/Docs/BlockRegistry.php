<?php

namespace Flexiwind\Docs;

/**
 * Résout le code source d'un block pour l'onglet « Code ».
 *
 * Même principe que ArtifactRegistry : chaque dépôt enregistre sa racine de
 * payloads, et le palier de la page passe devant. Sans ça, `login01` free et
 * `login01` pro — deux blocks différents portant le même nom de fichier —
 * se marcheraient dessus.
 */
final class BlockRegistry
{
    /** @var array<int, array{path: string, tier: Tier}> */
    private array $roots = [];

    public function add(string $path, Tier $tier): self
    {
        $this->roots[] = ['path' => rtrim($path, '/'), 'tier' => $tier];

        return $this;
    }

    /**
     * @return array{files: array<int, array<string, mixed>>}|null le payload décodé
     */
    public function find(string $name, ?Tier $prefer = null): ?array
    {
        $name = basename(trim($name));

        if ($name === '') {
            return null;
        }

        foreach ($this->ordered($prefer) as $root) {
            $file = $root['path'].'/'.$name.'.json';

            if (! is_file($file)) {
                continue;
            }

            $payload = json_decode((string) file_get_contents($file), true);

            if (is_array($payload)) {
                return $payload;
            }
        }

        return null;
    }

    /**
     * Les noms de payload disponibles pour un palier, triés. Sert de liste
     * blanche : un nom absent d'ici n'est jamais lu sur disque.
     *
     * @return list<string>
     */
    public function names(Tier $tier): array
    {
        $names = [];

        foreach ($this->ordered($tier) as $root) {
            foreach (glob($root['path'].'/*.json') ?: [] as $file) {
                $names[basename($file, '.json')] = true;
            }
        }

        $names = array_keys($names);
        sort($names);

        return $names;
    }

    /**
     * Strictement le palier demandé — pas de repli sur l'autre. Un block free
     * sans payload doit afficher « source non publiée », jamais le code pro
     * qui porte le même nom de fichier.
     *
     * @return array<int, array{path: string, tier: Tier}>
     */
    private function ordered(?Tier $prefer): array
    {
        if ($prefer === null) {
            return $this->roots;
        }

        return array_values(array_filter($this->roots, fn (array $r): bool => $r['tier'] === $prefer));
    }
}

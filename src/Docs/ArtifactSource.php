<?php

namespace Flexiwind\Docs;

/**
 * Un dépôt d'artefacts : une racine de vues + le palier qu'elle exige.
 *
 * - le repo public enregistre une source `free`
 * - le repo pro enregistre une source `pro`
 * - l'app hôte s'enregistre elle-même pour ses vues locales
 */
final class ArtifactSource
{
    public function __construct(
        public readonly string $name,
        public readonly Tier $tier,
        public readonly string $root,
        public readonly string $examplePrefix = 'examples',
        public readonly string $componentPrefix = 'ui',
        public readonly int $priority = 0,
        public readonly ?string $editUrl = null,
    ) {}

    public function example(string $name): ?Artifact
    {
        return $this->locate($this->examplePrefix, $name);
    }

    public function component(string $name): ?Artifact
    {
        return $this->locate($this->componentPrefix, $name);
    }

    private function locate(string $prefix, string $name): ?Artifact
    {
        $name = trim(str_replace('.', '/', $name), '/');

        if ($name === '') {
            return null;
        }

        $relative = 'components/'.$prefix.'/'.$name.'.blade.php';
        $file = rtrim($this->root, '/').'/'.$relative;

        if (! is_file($file)) {
            return null;
        }

        return new Artifact(
            status: Artifact::FOUND,
            component: $prefix.'.'.str_replace('/', '.', $name),
            file: $file,
            relative: $relative,
            tier: $this->tier,
            source: $this,
        );
    }
}

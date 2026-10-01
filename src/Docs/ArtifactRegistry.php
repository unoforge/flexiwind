<?php

namespace Flexiwind\Docs;

/**
 * Résout un artefact (exemple, composant) à travers toutes les sources
 * enregistrées, et applique le palier du site courant.
 *
 * C'est LA pièce qui permet à une page de doc publique de décrire un
 * composant pro sans jamais contenir son code : la page référence
 * `pro/select/default`, le résolveur va le chercher là où il se trouve —
 * ou rend un état verrouillé s'il n'y a pas droit.
 */
final class ArtifactRegistry
{
    /** @var ArtifactSource[] */
    private array $sources = [];

    private bool $sorted = true;

    public function add(ArtifactSource $source): self
    {
        $this->sources[] = $source;
        $this->sorted = false;

        return $this;
    }

    /** @return ArtifactSource[] */
    public function sources(): array
    {
        if (! $this->sorted) {
            usort($this->sources, fn (ArtifactSource $a, ArtifactSource $b): int => $b->priority <=> $a->priority);
            $this->sorted = true;
        }

        return $this->sources;
    }

    public function example(string $name, ?Tier $prefer = null): Artifact
    {
        return $this->resolve('example', $name, $prefer);
    }

    public function component(string $name, ?Tier $prefer = null): Artifact
    {
        return $this->resolve('component', $name, $prefer);
    }

    private function resolve(string $kind, string $name, ?Tier $prefer = null): Artifact
    {
        $current = Tier::current();
        $locked = null;

        foreach ($this->ordered($prefer) as $source) {
            $artifact = $source->{$kind}($name);

            if ($artifact === null) {
                continue;
            }

            if ($current->grants($artifact->tier)) {
                return $artifact;
            }

            $locked ??= $artifact->lock();
        }

        // Rien trouvé, mais la page le déclare pro : sur le site free, la
        // source n'existe tout simplement pas sur le disque.
        return $locked ?? Artifact::missing();
    }

    /**
     * Le palier de la page passe devant. Sans ça, une page pro dont l'exemple
     * porte le même nom qu'un exemple gratuit (select/default) afficherait la
     * démo gratuite.
     *
     * @return ArtifactSource[]
     */
    private function ordered(?Tier $prefer): array
    {
        $sources = $this->sources();

        if ($prefer === null) {
            return $sources;
        }

        $preferred = array_filter($sources, fn (ArtifactSource $s): bool => $s->tier === $prefer);
        $others = array_filter($sources, fn (ArtifactSource $s): bool => $s->tier !== $prefer);

        return [...$preferred, ...$others];
    }
}

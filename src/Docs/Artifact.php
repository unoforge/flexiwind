<?php

namespace Flexiwind\Docs;

final class Artifact
{
    public const FOUND = 'found';

    public const LOCKED = 'locked';

    public const MISSING = 'missing';

    public function __construct(
        public readonly string $status,
        public readonly ?string $component = null,
        public readonly ?string $file = null,
        public readonly ?string $relative = null,
        public readonly ?Tier $tier = null,
        public readonly ?ArtifactSource $source = null,
    ) {}

    public static function missing(): self
    {
        return new self(self::MISSING);
    }

    /**
     * Verrouille la SOURCE, pas le rendu : la preview reste affichable, seul
     * le code passe derrière l'abonnement. `file` étant nul, `code()` ne peut
     * plus rien renvoyer même par erreur.
     */
    public function lock(): self
    {
        return new self(
            self::LOCKED,
            component: $this->component,
            tier: $this->tier,
            source: $this->source,
        );
    }

    public function isRenderable(): bool
    {
        return $this->component !== null;
    }

    public function isFound(): bool
    {
        return $this->status === self::FOUND;
    }

    public function isLocked(): bool
    {
        return $this->status === self::LOCKED;
    }

    public function isMissing(): bool
    {
        return $this->status === self::MISSING;
    }

    public function code(): string
    {
        return $this->file !== null && is_file($this->file) ? (string) file_get_contents($this->file) : '';
    }
}

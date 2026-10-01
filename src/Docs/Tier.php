<?php

namespace Flexiwind\Docs;

enum Tier: string
{
    case Free = 'free';
    case Pro = 'pro';

    /** Le palier courant donne-t-il accès à un artefact de palier $required ? */
    public function grants(self $required): bool
    {
        return $this === self::Pro || $required === self::Free;
    }

    public static function current(): self
    {
        // L'override d'URL ne sert qu'à prévisualiser le rendu du site free
        // depuis le site pro. Il ne peut qu'ABAISSER le palier : passer ?tier=pro
        // ne déverrouille rien.
        if (config('flexiwind-docs.allow_tier_override') && app()->bound('request')) {
            if (self::tryFrom((string) request()->query('tier', '')) === self::Free) {
                return self::Free;
            }
        }

        return TierResolver::resolve();
    }
}

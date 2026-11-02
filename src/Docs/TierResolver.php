<?php

namespace Flexiwind\Docs;

use Closure;

/**
 * Comment le site hôte décide du palier d'un visiteur.
 *
 * Le paquet public ne connaît ni comptes ni abonnements. Le site pro
 * installe ici une fermeture qui lit l'abonnement de l'utilisateur connecté ;
 * sans résolveur, on retombe sur la configuration — c'est le cas du site open
 * source, qui est toujours `free`.
 *
 * (Une enum PHP ne peut pas porter de propriété, d'où cette petite classe
 * plutôt qu'un état statique sur Tier.)
 */
final class TierResolver
{
    /** @var (Closure(): Tier)|null */
    private static ?Closure $resolver = null;

    /** @param  Closure(): Tier  $resolver */
    public static function using(Closure $resolver): void
    {
        self::$resolver = $resolver;
    }

    public static function forget(): void
    {
        self::$resolver = null;
    }

    public static function resolve(): Tier
    {
        if (self::$resolver !== null) {
            return (self::$resolver)();
        }

        return Tier::tryFrom((string) config('flexiwind-docs.tier', 'free')) ?? Tier::Free;
    }
}

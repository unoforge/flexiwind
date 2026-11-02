<?php

namespace Flexiwind;

use Flexiwind\Console\CompileDocsCommand;
use Flexiwind\Docs\ArtifactRegistry;
use Flexiwind\Docs\ArtifactSource;
use Flexiwind\Docs\BlockRegistry;
use Flexiwind\Docs\ContentRoot;
use Flexiwind\Docs\Contracts\CodeHighlighter;
use Flexiwind\Docs\DocsIndex;
use Flexiwind\Docs\Navigation;
use Flexiwind\Docs\PlainCodeHighlighter;
use Flexiwind\Docs\Tier;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FlexiwindServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/flexiwind-docs.php', 'flexiwind-docs');

        $this->app->singleton(ArtifactRegistry::class);
        $this->app->singleton(DocsIndex::class);
        $this->app->singleton(Navigation::class);
        $this->app->singleton(BlockRegistry::class);
        $this->app->bind(CodeHighlighter::class, PlainCodeHighlighter::class);
    }

    public function boot(): void
    {
        // 1. Le docs-kit : <x-fw-docs::preview />, <x-fw-docs::locked />, …
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'fw-docs');

        // 2. Parité de résolution. Les sources free se résolvent EXACTEMENT
        //    comme dans un projet utilisateur après `flexi add` :
        //    <x-ui.button />, <x-blocks.hero01 />, <x-examples.button.sizes />.
        //    Les vues de l'app passent en premier : surcharge possible sans fork.
        View::addLocation(__DIR__.'/../registry/views');

        //    Les démos Livewire des exemples (<livewire:listbox-demo />…) :
        //    elles servent la documentation, `flexi add` ne les installe pas.
        if (class_exists(Livewire::class)) {
            Livewire::addLocation(viewPath: __DIR__.'/../registry/views/livewire');
        }

        // 3. Les vues générées depuis le Markdown.
        View::addNamespace('fw-content', (string) config('flexiwind-docs.compiled_path'));

        // 4. Le repo public s'enregistre comme source d'artefacts "free"…
        $this->app->make(ArtifactRegistry::class)->add(new ArtifactSource(
            name: 'flexiwind',
            tier: Tier::Free,
            root: __DIR__.'/../registry/views',
            examplePrefix: 'examples',
            componentPrefix: 'ui',
            priority: 50,
            editUrl: 'https://github.com/unoforge/flexiwind/blob/main/registry/views',
        ));

        // 5. …comme source de payloads de blocks free (onglet « Code »)…
        $this->app->make(BlockRegistry::class)->add(__DIR__.'/../registries', Tier::Free);

        // 6. …et comme source de contenu. TOUTE la doc vit ici, y compris
        //    celle des composants pro.
        $this->app->make(DocsIndex::class)->addRoot(new ContentRoot(
            name: 'flexiwind',
            path: __DIR__.'/../content',
            editUrl: 'https://github.com/unoforge/flexiwind/edit/main/content',
            priority: 0,
        ));

        // 7. La navigation, dérivée du front matter, publiée à la forme exacte
        //    de config('sidebar') : la sidebar, le paginateur prev/next et le
        //    SEO du site hôte fonctionnent sans une ligne de changement.
        if (config('flexiwind-docs.publish_sidebar_config')) {
            $this->app->booted(function (): void {
                config(['sidebar' => $this->app->make(Navigation::class)->groups()]);
            });
        }

        if ($this->app->runningInConsole()) {
            $this->commands([CompileDocsCommand::class]);

            $this->publishes([
                __DIR__.'/../config/flexiwind-docs.php' => config_path('flexiwind-docs.php'),
            ], 'flexiwind-config');
        }
    }
}

<?php

namespace Flexiwind\Console;

use Flexiwind\Docs\DocsIndex;
use Flexiwind\Docs\PageCompiler;
use Illuminate\Console\Command;

class CompileDocsCommand extends Command
{
    protected $signature = 'flexiwind:docs {--force : Recompile tout, même ce qui est à jour}';

    protected $description = 'Compile le contenu Markdown en vues Blade (à lancer au build / déploiement)';

    public function handle(DocsIndex $index, PageCompiler $compiler): int
    {
        $pages = $index->pages();

        if ($pages === []) {
            $this->components->warn('Aucune page Markdown trouvée.');

            return self::SUCCESS;
        }

        $compiled = 0;

        foreach ($pages as $page) {
            if (! $this->option('force') && ! $compiler->isStale($page)) {
                continue;
            }

            $compiler->compile($page);
            $compiled++;

            $this->components->twoColumnDetail(
                $page->slug.'.md',
                '<fg=gray>'.$page->tier()->value.'</> <fg=green>compilé</>'
            );
        }

        $this->newLine();
        $this->components->info($compiled.' page(s) compilée(s) sur '.count($pages).'.');

        return self::SUCCESS;
    }
}

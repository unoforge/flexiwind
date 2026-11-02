<?php

return [
    /*
    |----------------------------------------------------------------------
    | Palier du site courant
    |----------------------------------------------------------------------
    | 'free' => le site public : les artefacts pro s'affichent verrouillés.
    | 'pro'  => le site de Pro : tout est rendu.
    */
    'tier' => env('FLEXIWIND_TIER', 'pro'),

    // Autorise ?tier=free dans l'URL pour prévisualiser le rendu du site free.
    'allow_tier_override' => env('FLEXIWIND_TIER_OVERRIDE', true),

    // Où atterrissent les vues Blade générées depuis le Markdown (artefact de build).
    'compiled_path' => storage_path('framework/flexiwind-docs'),

    // En local on recompile dès que le .md change. En prod : php artisan flexiwind:docs.
    'auto_compile' => env('FLEXIWIND_DOCS_AUTO_COMPILE', true),

    // Le wrapper de page du site hôte (header, TOC, pagination).
    'page_wrapper' => 'layouts.doc-page-wrapper',

    // Où envoyer quelqu'un qui tombe sur un artefact verrouillé.
    'upgrade_url' => '/pricing',

    'seo' => [
        'keywords' => 'flexiwind, laravel components, laravel ui, tailwind css, tailwind v4, blade components, livewire',
        'og_image' => '/cover-flexiwind.png',
        'og_alt' => 'Flexiwind — Tailwind CSS Components & Blocks for Laravel',
    ],

    /*
    |----------------------------------------------------------------------
    | Navigation
    |----------------------------------------------------------------------
    | L'ordre des groupes de la sidebar. Une page déclare son groupe dans son
    | front matter ; un groupe absent de cette liste passe à la fin.
    | `sections` associe un préfixe d'URL aux groupes qu'il affiche.
    */
    'groups' => [
        'Getting Started',
        'Design System',
        'Actions & Inputs',
        'Layout & Structure',
        'Navigation',
        'Data & Feedback',
        'Overlays & Disclosure',
        'Typography',
        'Plugins',
        'Data Visualization',
        'ECharts',
        'Advanced Examples',
    ],

    /*
    |----------------------------------------------------------------------
    | Sections autonomes
    |----------------------------------------------------------------------
    | Une section dont les pages vivent sous leur propre préfixe d'URL
    | (content/cookbook/… -> /cookbook/…) avec leur propre sidebar, leur
    | propre ordre de lecture et leur propre layout. La sidebar commune de
    | /docs et /components n'en affiche rien, et inversement.
    */
    'standalone_sections' => [
        'cookbook' => [
            'layout' => 'layouts::cookbook',
            'groups' => [
                'Getting Started',
                'Recipes',
                'Tips & snippets',
            ],
        ],
    ],

    // Le layout des pages hors sections autonomes.
    'layout' => 'layouts::docs',

    // Paliers listés dans la sidebar. Mettre ['free'] sur le site public pour
    // masquer entièrement les pages pro au lieu de les afficher verrouillées.
    'nav_tiers' => ['free', 'pro'],

    // Publie la navigation dans config('sidebar') pour que la sidebar, le
    // paginateur et le SEO du site hôte fonctionnent sans modification.
    'publish_sidebar_config' => true,

    /*
    |----------------------------------------------------------------------
    | Markdown -> composants Blade du design system
    |----------------------------------------------------------------------
    | Le compilateur ne réinvente aucun style : il traduit le HTML produit
    | par CommonMark vers TES composants. Une ligne à changer si un
    | composant bouge.
    */
    'html_map' => [
        'h2' => 'x-md.h2',
        'h3' => 'x-md.h3',
        'h4' => 'x-md.h4',
        'p' => 'x-md.paragraph',
        'ul' => 'x-md.ul',
        'ol' => 'x-md.ol',
        'li' => 'x-md.li',
        'blockquote' => 'x-docs.callout',
        'code' => 'x-docs.inline-code',
    ],

    'link_component' => 'x-docs.link',

    // Tableaux Markdown -> table du design system.
    'table' => [
        'component' => 'x-docs.table',
        'row' => 'x-ui.table.row',
        'cell' => 'x-ui.table.cell',
    ],

    // Blocs de code -> composants existants du site (titre, icône, copie, tabs).
    'code' => [
        'single' => 'x-base.single-code-block',
        'tabs' => 'x-base.load-code-in-tab',
        'terminal' => 'x-base.terminal',
        'shell_languages' => ['bash', 'sh', 'shell', 'zsh'],
    ],

    /*
    |----------------------------------------------------------------------
    | Exemples affichés dans une iframe
    |----------------------------------------------------------------------
    | ::preview{example="sidebar/demo" iframe} rend l'exemple seul, dans une
    | page complète, puis l'affiche dans une iframe : pour les navbars,
    | sidebars et tout ce qui a besoin d'un vrai viewport. Le site hôte
    | déclare cette route ; elle reçoit `example` (ex. "sidebar/demo").
    */
    'example_preview_route' => 'preview.example',

    /*
    |----------------------------------------------------------------------
    | Directives autorisées dans le Markdown
    |----------------------------------------------------------------------
    | Jeu fermé et volontairement minuscule. Tout le reste est du Markdown
    | standard, éditable par n'importe qui depuis GitHub.
    |
    | Feuilles    : ::nom{attr="valeur"}
    | Conteneurs  : :::nom{…} … :::   (imbrication : le parent prend un
    |               niveau de deux-points de plus)
    */
    'directives' => [
        'preview' => 'x-fw-docs::preview',
        'source' => 'x-fw-docs::source',
        'terminal' => 'x-base.terminal',
        'callout' => 'x-docs.callout',
        'steps' => 'x-docs.steps',
        'step' => 'x-docs.step',
        'references' => 'x-md.references-grid',
        'reference' => 'x-md.reference',
        'preview-box' => 'x-docs.component-prev',
        'tabs' => null,  // traité par le compilateur (groupe de fences)
        'raw' => null,   // Blade brut, émis verbatim
    ],
];

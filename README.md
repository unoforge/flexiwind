# Flexiwind

Composants et blocks gratuits, **toute** la documentation, et le moteur qui la rend.

MIT. Les issues et les pull requests sont les bienvenues — y compris sur les
pages de doc des composants premium, qui vivent ici comme les autres.

```
flexiwind/
├─ content/                      ← LA documentation (68 pages)
│  ├─ docs/**/*.md               → /docs/…
│  └─ components/**/*.md         → /components/…
├─ registry/views/components/
│  ├─ ui/                        ← primitives gratuites   → <x-ui.button />
│  ├─ blocks/                    ← blocks gratuits        → <x-blocks.hero01 />
│  └─ examples/                  ← exemples de la doc     → <x-examples.button.sizes />
├─ registries/*.json             ← index servi au CLI (raw GitHub)
├─ resources/views/components/   ← docs-kit : preview, locked, source
├─ src/                          ← moteur de docs
├─ bin/chart-palettes.mjs        ← palettes --chart-1..5 des thèmes (calcul et --check)
└─ bin/import-docs.php           ← convertisseur Blade → Markdown (migration, jetable)
```

## Écrire une page

**Le chemin du fichier EST l'URL.** `content/components/advanced/select.md` se
sert sur `/components/advanced/select`. Il n'y a rien à déclarer ailleurs.

Le front matter porte le reste — navigation, pagination, SEO, palier :

```md
---
title: "Select"
group: "Advanced"        # groupe de sidebar, ordonné par config/flexiwind-docs.php
order: 10                # position dans le groupe
tier: "pro"              # free | pro
state: "new"             # draft | updated | new | wip  (badge, optionnel)
hideInSidebar: false     # optionnel
description: "…"
seoDescription: "…"
keywords: "…"
---
```

Il n'y a **pas** de `config/sidebar.php` à tenir à jour en parallèle : la
sidebar, la pagination prev/next et le SEO sont tous dérivés de ce front
matter. Ajouter une page, c'est ajouter un `.md`.

### Les directives

Jeu fermé et volontairement minuscule : tout le reste est du Markdown standard,
éditable depuis l'éditeur web de GitHub sans rien connaître de Blade.

| Directive | Rend |
| --- | --- |
| `::preview{example="button/sizes"}` | onglets Preview / Code |
| `::preview{example="button/sizes" inline}` | preview et code empilés, sans onglets |
| `::source{component="button"}` | le code source de la primitive |
| `::terminal{code="php artisan flexi:add button"}` | un bloc shell |
| `:::callout{type="warning"} … :::` | encadré (`note`, `warning`, `update`, `important`) |
| `::::steps` + `:::step` | procédure numérotée |
| `::::references` + `::reference{href title description}` | grille de liens |
| `::::tabs` + plusieurs fences | bloc de code à onglets |
| `:::raw … :::` | Blade brut, émis verbatim — l'échappatoire |

**Imbrication :** le conteneur parent prend toujours un deux-points de plus que
ses enfants, comme les fences Markdown.

### Les blocs de code

Une fence ```` ```bash ```` devient un terminal. Toute autre fence devient un
bloc de code titré :

````md
```css title="app.css" lines="3:add,4:remove"
@theme inline { … }
```
````

Ce que le Markdown standard couvre déjà : titres, paragraphes, gras, listes,
liens, code inline, **tableaux** (l'ancien tableau d'API du bouton faisait 40
lignes de Blade, il en fait 8 ici).

## Comment c'est rendu

Markdown → Blade **au build**, pas au runtime.

```bash
php artisan flexiwind:docs           # compile ce qui a changé
php artisan flexiwind:docs --force   # tout recompiler
```

En local, `auto_compile` recompile dès que le `.md` change : tu édites, tu
rafraîchis. En prod la commande tourne au déploiement, et il ne reste plus
aucun parsing Markdown à l'exécution — juste du Blade compilé en PHP.

Le compilateur ne réinvente aucun style : il traduit le HTML de CommonMark vers
les composants du design system (`x-md.h2`, `x-docs.table`, `x-docs.callout`,
`x-base.single-code-block`…). Toutes les correspondances sont dans
`config/flexiwind-docs.php` — une ligne à changer si un composant bouge.

## Le résolveur d'artefacts

C'est la pièce centrale. Une page référence `button/sizes` ; le résolveur
parcourt les sources enregistrées et retourne :

- **trouvé** → preview + code ;
- **verrouillé** → l'artefact existe mais le site n'a pas le palier ;
- **absent** → rien sur disque ; si la page est `tier: pro`, verrouillé aussi.

Le palier de la page passe devant dans l'ordre de recherche : sans ça, une page
pro dont l'exemple s'appelle `select/default` afficherait la démo gratuite du
même nom.

`View::addLocation(registry/views)` garantit la **parité de résolution** : dans
la doc comme dans un projet utilisateur après `flexi add`, on écrit
`<x-ui.button />`. Les exemples de la doc sont copiables-collables tels quels.

## Ajouter un composant gratuit

1. la source dans `registry/views/components/ui/<nom>.blade.php` ;
2. au moins un exemple dans `registry/views/components/examples/<nom>/demo.blade.php` ;
3. l'entrée `registries/<nom>.json` — `path` = où le fichier vit ici,
   `target` = où le CLI le dépose chez l'utilisateur ;
4. la page `content/components/<nom>.md`.

## Le convertisseur

`bin/import-docs.php` a servi à migrer les 68 pages depuis les anciennes vues
Blade des deux sites. Il est **jetable** : une fois les anciennes vues
supprimées, il n'a plus de raison d'exister.

```bash
php bin/import-docs.php --dry   # rapport sans écrire
php bin/import-docs.php
```

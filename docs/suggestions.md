# Analyse & Suggestions pour Flexiwind

> Analyse réalisée le 10 juillet 2026 après étude complète du code source.
> Architecture comprise : CLI à la shadcn/ui, code ownership, Flexilla pour les interactions, starter kit disponible.

---

## Résumé des bugs trouvés

| # | Fichier | Sévérité | Description |
|---|---------|-----------|-------------|
| 1 | `card.blade.php:24-25` | **Haute** | Syntaxe CSS invalide : `--spacing(2.5]` au lieu de `--spacing(2.5))` |
| 2 | `switch.blade.php:25` | **Haute** | `{{ $class }}` en PHP string → class littérale jamais interprétée |
| 3 | `modal/header.blade.php:31` | **Critique** | `</x-ui.smodal.title>` typo → crash du composant |
| 4 | `slideover/header.blade.php:30` | **Critique** | `</x-ui.sliderover.title>` typo → crash du composant |
| 5 | `accordion/item.blade.php:9` | **Moyenne** | PHP warnings pour le variant 'default' |
| 6 | `tabs.blade.php:3` | **Moyenne** | `role="tab"` au lieu de `role="tablist"` → accessibilité |
| 7 | `modal/footer.blade.php:6`, `slideover/footer.blade.php:5`, `slideover/header.blade.php:19` | **Haute** | `calc()` sans espaces autour du `-` → CSS invalide |
| 8 | `input.blade.php`, `select.blade.php`, `textarea.blade.php` | **Moyenne** | Attribut `id` dupliqué quand l'utilisateur passe un `id` |
| 9 | `radio.blade.php:23` | **Moyenne** | Fallback ID peut produire une chaîne vide |
| 10 | `link.blade.php:52` | **Faible** | Attribut `href` sur `<button>` quand `asButton=true` |
| 11 | `callout/title.blade.php:3` | **Faible** | `font-mdium` (typo) au lieu de `font-medium` |

---

## Détail des bugs

### Bug 1 — card.blade.php : CSS variable mal formée

```php
// Lignes 24-25 — manque ))
'[--card-padding:var(--ui-padding,--spacing(2.5)]'  // devrait être ...spacing(2.5))]
'[--card-padding:var(--ui-padding,--spacing(5)]'    // devrait être ...spacing(5))]
```

Les lignes 22-23 (`default`, `2xs`, `xs`) sont correctes. Seuls `sm` et `lg` sont affectés. La propriété `--card-padding` ne sera pas appliquée pour ces tailles.

### Bug 2 — switch.blade.php : classe utilisateur jamais appliquée

```php
$className .= " {{ $class }}";  // ligne 25
```

Dans un bloc `@php`, Blade n'interprète pas `{{ }}`. Le résultat est une classe CSS littérale nommée `{{ $class }}`. La prop `class="foo"` ne sera jamais appliquée au rendu.

Correction :
```php
$className .= " {$class}";
```

### Bug 3 — modal/header.blade.php : typo dans le closing tag

```php
</x-ui.smodal.title>  // ligne 31 — "smodal" au lieu de "modal"
```

Le tag ouvrant (ligne 25) est correct : `<x-ui.modal.title>`.
Quand un `title` est passé, le composant **crash** en cherchant `smodal.title`.

### Bug 4 — slideover/header.blade.php : même typo

```php
</x-ui.sliderover.title>  // ligne 30 — "sliderover" au lieu de "slideover"
```

Même problème : crash en cherchant `sliderover.title`.

### Bug 5 — accordion/item.blade.php : PHP warnings

```php
$variantClass = UiHelper::getClasses($variant, $intent);  // ligne 9
```

`UiHelper::getClasses()` est appelée sans vérifier si `$variant` est `'default'`. Or `UiHelper::$variants` n'a pas de clé `'default'` → `Undefined array key "intent"` + `Trying to access array offset on null`.

Les composants `alert.blade.php` et `badge.blade.php` font correctement ceci :
```php
$variantClass = $variant == 'default' ? ' bg-muted text-foreground' : UiHelper::getClasses($variant, $intent);
```

### Bug 6 — tabs.blade.php : rôle ARIA incorrect

```php
role="tab"  // ligne 3 — devrait être "tablist"
```

Selon la spec ARIA, `role="tab"` appartient aux éléments de déclenchement individuels, pas au conteneur. Le conteneur doit porter `role="tablist"`.

### Bug 7 — calc() sans espaces

```php
'pb-[calc(var(--gutter)---spacing(3))]'  // présent dans 3 fichiers
```

CSS `calc()` exige des espaces autour des opérateurs `+` et `-`. Ici, le résultat après résolution Tailwind donne `calc(var(--gutter)-0.75rem)`, ce qui est **invalide** car `-0.75rem` est parsé comme un nombre négatif unique.

### Bug 8 — Attribut `id` dupliqué (input, select, textarea)

Quand l'utilisateur passe `id="email"` :
- `$id = $attributes->get('id')` → `"email"`
- `<input id="{{ $id }}"` → `id="email"`
- `{{ $attributes->class([...]) }}` → émet aussi l'attribut `id="email"` du attribute bag original

Résultat : `<input id="email" id="email">`. Solution : retirer `id` du attribute bag ou utiliser `$attribute->except('id')`.

### Bug 9 — radio.blade.php : ID potentiellement vide

```php
$id = $id ?? $name;  // si les deux sont null/empty → $id = ""
```

`checkbox.blade.php` utilise `uniqid()` comme fallback, pas radio. Une chaîne vide comme `id` est invalide et brise les associations `<label for="">`.

### Bug 10 — link.blade.php : `href` sur `<button>`

Quand `asButton=true`, tous les attributs (y compris `href`) sont transmis à `<x-ui.button>`. Si `href` est présent (non null), le bouton reçoit `<button href="..."` ce qui est HTML invalide.

### Bug 11 — callout/title.blade.php

```php
'font-mdium'  // devrait être 'font-medium'
```

La classe Tailwind n'existe pas → pas d'effet visuel.

---

## Problèmes de conception & suggestions

### 1. Duplication massive du pattern label+input

Dans `input.blade.php`, `select.blade.php` et `textarea.blade.php`, le même pattern est copié-collé :

```blade
@if ($label)
    <div class="{{ $labelPosition === 'inline' ? 'flex items-center gap-2' : 'flex flex-col space-y-2' }} {{ $groupWrapperClass ?? '' }}">
        <x-ui.label for="{{ $id }}" :text="$label" class="{{ $labelClass }}" />
        <!-- input/select/textarea -->
    </div>
@else
    <!-- input/select/textarea -->
@endif
```

**Suggestion** : extraire ce pattern dans une vue partielle ou un slot, pour qu'une modification (ajout de `invalidMessage`) soit répercutée partout. Ça réduit la duplication et les bugs.

### 2. Génération d'ID inconsistante

| Composant | Stratégie |
|---|---|
| `input`, `select`, `textarea` | `$attributes->get('id') ?? $attributes->get('name', uniqid('input-'))` |
| `checkbox` | `$attributes->get('id') ?? $attributes->get('name', uniqid('checkbox-'))` |
| `radio` | `$id = $id ?? $name` (peut être vide) |
| `switch` | Pas de génération d'ID |

**Suggestion** : uniformiser avec une fonction helper ou une classe de trait :
```php
$id = $attributes->get('id') ?? $attributes->get('name', uniqid('flexiwind-'));
```

### 3. Pas de `aria-label` pour les icon-only buttons

Le composant `button` a une prop `iconOnly` mais n'exige ni ne documente `aria-label`. Les utilisateurs risquent de créer des boutons inaccessibles.

**Suggestion** : soit rendre obligatoire `aria-label` quand `iconOnly=true`, soit extraire le texte du slot comme `aria-label` :

```php
@if ($iconOnly && !$attributes->has('aria-label') && !$attributes->has('aria-labelledby'))
    <!-- warning en debug : icon-only button should have aria-label -->
@endif
```

### 4. Pas de `wire:model` detection

Quand un utilisateur utilise `wire:model="name"` sur un `x-ui.input`, le composant génère un `id` qui peut entrer en conflit avec l'ID généré par Livewire. De plus, la prop `checked` sur `checkbox`/`radio` peut écraser la valeur Livewire.

**Suggestion** : dans les composants form, détecter `wire:model` et :
- Ne pas surcharger `checked`/`value` si `wire:model` est présent
- Ne pas générer d'ID automatique (laisser Livewire le faire)

### 5. Le composant `switch` manque de props essentielles

- Pas de `name`, `value`, `checked`, `disabled`
- Pas de support pour `wire:model`
- Pas de `label`

Un switch est un `<input type="checkbox">` — il devrait supporter les mêmes attributs. Les développeurs qui veulent un toggle avec label doivent le construire manuellement à chaque fois.

### 6. `input/group.blade.php` vs `input.blade.php` — confusion可能的

Les deux existent, mais :
- `input.blade.php` = input simple avec label
- `input/group.blade.php` = input avec leading/trailing icons

Mais ils ne sont pas reliés. Un utilisateur qui veut un input avec icône et label est perdu : doit-il imbriquer `<x-ui.input>` dans `<x-ui.input.group>` ? La réponse est non — il doit utiliser `<x-ui.input.group>` sans `<x-ui.input>`, avec un `<input>` nu dedans.

**Suggestion** : soit fusionner les deux, soit documenter clairement l'API et le rapport entre les deux composants.

---

## Composants manquants (gaps)

| Composant | Cas d'usage | Priorité |
|---|---|---|
| **Toast / Notification** | Feedback après action (sauvegarde, erreur, envoi) | Haute |
| **Combobox / Autocomplete** | Sélection avec recherche (très commun) | Haute |
| **Date Picker** | Sélection de date | Haute |
| **File Input** | Upload de fichier avec preview | Haute |
| **Rating** | Évaluation par étoiles | Moyenne |
| **Command Palette / Kbd** | Palette de commandes (Cmd+K) | Moyenne |
| **Stepper / Steps** | Formulaires multi-étapes | Moyenne |
| **Timeline** | Affichage chronologique | Basse |
| **Drawer** | Panneau latéral (déjà slideover, mais drawer est plus standard) | Basse |

Le starter kit et la CLI sont en place ; ces composants pourraient être ajoutés comme des blocs CLI (`flexi:add toast`) sans impacter le noyau.

---

## Qualité du code

### Tests

**Zéro test** pour les composants UI. 4 tests existent uniquement pour les pages docs et le sidebar paginator. Un composant comme `button` avec 106 lignes de PHP devrait avoir au moins :
- Test de rendu avec props par défaut
- Test variant + intent → classes CSS correctes
- Test mode `href` → rend `<a>` au lieu de `<button>`
- Test `disabled` → attribut présent
- Test `iconOnly` → vérifie aria-label (si fourni)

### Extraction de la logique PHP

Dans `button.blade.php`, le bloc `@php` fait ~60 lignes avec toute la logique métier (variants, intents, tailles, URL detection). C'est difficile à tester et à maintenir.

**Suggestion** : extraire dans une classe `ButtonRenderer` ou utiliser des Laravel View Objects :

```php
class ButtonRenderer
{
    public function __construct(
        public string $variant = 'solid',
        public ?string $intent = null,
        public string $size = 'md',
        // ...
    ) {}

    public function classes(): array
    {
        // logique testable ici
    }

    public function tag(): string
    {
        return $this->href ? 'a' : 'button';
    }
}
```

### Inconsistances de style

- Parfois `match ()`, parfois `if/elseif` dans le même fichier
- Parfois `$var ?? $default`, parfois `isset($var) ? $var : $default`
- Les espaces et retours à la ligne varient entre composants (certains ont des lignes vides après `@php`, d'autres non)

Rien de bloquant mais une normalization (Pint) serait bénéfique.

---

## Documentation

### Ce qui existe déjà et fonctionne bien
- Guide d'installation complet avec CLI + starter kit
- Doc par composant dans `skills/flexiwind/components/` (30+ fichiers)
- Doc theming (couleurs, boutons, utilitaires)
- Mode sans Alpine documenté pour les composants majeurs
- Références : best-practices, accessibility, performance

### Ce qui manque

1. **Table des props** pour chaque composant dans la documentation en ligne (pas seulement dans le skill). Actuellement, les props ne sont listées que dans les fichiers Blade. Un développeur doit lire le `@props` du fichier source pour connaître l'API complète.

2. **Gestion des erreurs** : que se passe-t-il si je passe `variant="pink"` à un bouton ? (Réponse : fallback silencieux vers chaîne vide). Ce comportement devrait être documenté.

3. **Patterns de composition réels** : comment combiner `input`, `label`, `input/leading`, `input/trailing` et `button` dans un formulaire concret ?

4. **Captures d'écran dark/light** dans la doc des composants.

5. **Cycle de vie des mises à jour** : comment un utilisateur met à jour un composant déjà installé dans son projet ? Le CLI le gère-t-il ? Si oui, le documenter. Si non, c'est un gap important.

---

## Conclusion

Flexiwind est un projet bien conçu avec une architecture claire (CLI + code ownership), une documentation solide et une palette de composants couvrant la majorité des besoins d'une application Laravel.

**12 bugs** ont été identifiés, dont 2 critiques (typo dans les closing tags `modal/header` et `slideover/header`) et 3 haute sévérité (card CSS, switch class, calc sans espaces). Ces bugs sont rapides à corriger.

Les améliorations principales à considérer sont :
1. **Corriger les 12 bugs** (certains prennent 30 secondes)
2. **Uniformiser le pattern label+input** pour réduire la duplication
3. **Ajouter des tests** pour les composants (render tests, variant tests)
4. **Extraire la logique PHP** des templates vers des classes testables
5. **Combler les gaps** : toast, combobox, file input, date picker

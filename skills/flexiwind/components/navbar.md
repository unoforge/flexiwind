## Installation

```shell
npm i @flexilla/alpine-navbar
```

The navbar is JS-driven. After installing the npm package, import the plugin:

```js
import NavbarPlugin from "./plugins/nav-bar";
Alpine.plugin(NavbarPlugin);
```

## AlpineJS Directives

| Directive | Description |
| --- | --- |
| x-navbar | Applied to navbar element to enable navigation and mobile menu behavior |
| data-toggle-nav | Applied to trigger elements to open/close mobile navigation |

## Data attributes

| Attribute | Description |
| --- | --- |
| data-nav-overlay | Identifies the mobile navigation overlay element |
| data-navbar-id | Unique identifier for the navbar instance |
| data-toggle-nav | Links trigger element to specific navbar instance |
| aria-expanded | Accessibility state for mobile menu toggle |

## Structure

```html
<div data-nav-overlay data-navbar-id="yourNavbarId" aria-hidden="true"
     class="fixed bg-gray-800/40 inset-0 z-30 hidden fx-open:flex lg:hidden"></div>

<header class="w-full z-45 relative">
    <nav class="max-w-4xl mx-auto w-full flex justify-between">
        <button data-toggle-nav="yourNavbarId" aria-label="Toggle navbar">
            <!-- Hamburger icon -->
        </button>
        <a href="/">Your Brand</a>
        <div x-data x-navbar id="yourNavbarId" class="flex lg:flex-1">
            <!-- Navigation items -->
        </div>
    </nav>
</header>
```

## Public Docs

`https://flexiwind.unoforge.com/components/navbar`

## Guidance

- There is no standalone `x-ui.navbar` Blade component in the repo. Navbar is a documented usage pattern using AlpineJS directives.
- Use `fx-open:` prefix for classes applied when mobile menu is open.

## Avoid

- Do not invent `x-ui.navbar.*` subcomponents — no such Blade files exist.
- Do not install via `php artisan flexi:add` — navbar requires the npm package only.

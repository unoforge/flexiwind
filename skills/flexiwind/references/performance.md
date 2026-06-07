# Performance

Use this reference for performance guidance that stays compatible with real Flexiwind usage.

## Safe Guidance

- reuse existing Flexiwind primitives and blocks instead of duplicating large custom markup structures
- use Livewire loading states and debounced models where appropriate in consumer code
- use skeletons for loading placeholders when the component docs already provide them
- prefer blocks for full sections when they reduce repeated layout work

## Avoid Unverified Claims

- do not prescribe framework setup that conflicts with the project docs
- do not assume a `tailwind.config.js`-driven workflow when Flexiwind theme guidance is documented elsewhere
- do not recommend component APIs that are not present in the repo

## Public Docs To Check First

- `https://flexiwind.unoforge.com/docs/installation`
- `https://flexiwind.unoforge.com/docs/theme`
- `https://flexiwind.unoforge.com/components/skeleton`
- `https://flexiwind.unoforge.com/blocks`

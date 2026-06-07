# Overlays And Feedback

Use this reference for components that open, reveal, or layer content.

## Individual Component Files

For detailed API references, examples, and props tables, see the individual component files:

- [modal.md](./modal.md)
- [slideover.md](./slideover.md)
- [dropdown.md](./dropdown.md)
- [popover.md](./popover.md)
- [tooltip.md](./tooltip.md)
- [accordion.md](./accordion.md)
- [collapse.md](./collapse.md)
- [alert-dialog.md](./alert-dialog.md)
- [dissmissible.md](./dissmissible.md)

## Public Docs

- `https://flexiwind.unoforge.com/components/modal`
- `https://flexiwind.unoforge.com/components/alert-dialog`
- `https://flexiwind.unoforge.com/components/slideover`
- `https://flexiwind.unoforge.com/components/dropdown`
- `https://flexiwind.unoforge.com/components/popover`
- `https://flexiwind.unoforge.com/components/tooltip`
- `https://flexiwind.unoforge.com/components/accordion`
- `https://flexiwind.unoforge.com/components/collapse`

## Verified Blade Primitives

- `x-ui.modal`
- `x-ui.modal.trigger`
- `x-ui.modal.content`
- `x-ui.modal.header`
- `x-ui.modal.title`
- `x-ui.modal.description`
- `x-ui.modal.body`
- `x-ui.modal.footer`
- `x-ui.modal.close`
- `x-ui.slideover`
- `x-ui.slideover.trigger`
- `x-ui.slideover.content`
- `x-ui.slideover.header`
- `x-ui.slideover.title`
- `x-ui.slideover.description`
- `x-ui.slideover.body`
- `x-ui.slideover.footer`
- `x-ui.slideover.close`
- `x-ui.dropdown`
- `x-ui.dropdown.trigger`
- `x-ui.dropdown.item`
- `x-ui.dropdown.section`
- `x-ui.dropdown.separator`
- `x-ui.dropdown.label`
- `x-ui.popover`
- `x-ui.popover.trigger`
- `x-ui.tooltip`
- `x-ui.tooltip.trigger`
- `x-ui.accordion`
- `x-ui.accordion.item`
- `x-ui.accordion.trigger`
- `x-ui.accordion.content`
- `x-ui.accordion.indicator`
- `x-ui.collapse`
- `x-ui.collapse.trigger`
- `x-ui.collapse.indicator`

## Important Notes

- `alert-dialog` is documented, but the docs explicitly describe it as built on top of modal primitives.
- `modal` uses a `dialog` element in the current implementation and relies on Alpine/data attributes.
- `slideover` mirrors the modal composition style.

## Avoid

- Do not present `alert-dialog` as a standalone primitive unless such a file actually exists.
- Do not flatten modal or slideover into a single tag when the real implementation is multi-part.
- Do not remove the trigger/content structure from accordion or collapse guidance.

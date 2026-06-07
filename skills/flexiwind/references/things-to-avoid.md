# Things To Avoid

These are the most important mistakes to avoid when answering Flexiwind questions.

## Do Not Invent APIs

- do not invent `x-ui` components that are not present in `resources/views/components/ui`
- do not invent props that are not declared in the component implementation
- do not invent CLI commands or install slugs that are not shown in the docs
- do not invent block names outside `config/blocks.php`

## Do Not Confuse Docs Names With Blade Names

- `/components/aspect-ratio` is not `x-ui.aspect-ratio`
- `/components/text-area` is not `x-ui.text-area`
- `/components/sidebar` does not mean a standalone `x-ui.sidebar` primitive exists in this repo
- `/components/alert-dialog` does not mean there is a standalone `x-ui.alert-dialog` file

## Do Not Bypass Documented Composition

- do not ignore `x-ui.input.group` rules for composed inputs and selects
- do not flatten modal, slideover, tabs, accordion, or collapse into fake single-tag APIs
- do not recommend raw HTML when a verified Flexiwind primitive already covers the need

## Do Not Ignore Theme Guidance

- do not hardcode one-off colors when semantic tokens exist
- do not scatter button variant styling across many files if the theme docs centralize it
- do not treat Flexiwind as plain Tailwind snippets only; theme tokens are part of the system

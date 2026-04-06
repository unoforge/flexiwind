# Contributing

Thanks for contributing to Flexiwind.

## Ways to contribute
- Report bugs with clear reproduction steps.
- Propose improvements to components and docs.
- Open pull requests for focused, reviewable changes.

## Development setup
1. Install dependencies:
```bash
composer install
npm install
```
2. Prepare environment:
```bash
cp .env.example .env
php artisan key:generate
```
3. Run the app:
```bash
composer dev
```

## Quality checks
Run these before opening a PR:
```bash
php artisan test
npm run build
```

## Pull request guidelines
- Keep PRs scoped to one concern.
- Include screenshots for UI changes.
- Update docs when behavior changes.
- Reference related issues in the PR description.

## Commit guidance
Use clear, imperative commit messages, for example:
- `docs: clarify theme token usage`
- `fix: add missing sidebar code snippet key`

## Code of conduct
By participating, you agree to follow the Code of Conduct in `CODE_OF_CONDUCT.md`.

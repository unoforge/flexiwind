<?php

namespace Flexiwind\Docs;

use Illuminate\Support\Str;

final class DocPage
{
    /** @param array<string, mixed> $meta */
    public function __construct(
        public readonly string $file,
        public readonly string $slug,
        public readonly array $meta,
        public readonly ContentRoot $root,
    ) {}

    /** Le chemin du fichier EST l'URL : content/components/button.md -> /components/button */
    public function url(): string
    {
        return '/'.ltrim($this->slug, '/');
    }

    public function title(): string
    {
        return (string) ($this->meta['title'] ?? Str::of($this->slug)->afterLast('/')->headline());
    }

    public function tier(): Tier
    {
        return Tier::tryFrom((string) ($this->meta['tier'] ?? 'free')) ?? Tier::Free;
    }

    public function group(): string
    {
        return (string) ($this->meta['group'] ?? 'Documentation');
    }

    public function order(): int
    {
        return (int) ($this->meta['order'] ?? 100);
    }

    /** Section de navigation : le premier segment de l'URL (docs, components, …). */
    public function section(): string
    {
        return (string) ($this->meta['section'] ?? Str::before(ltrim($this->slug, '/'), '/'));
    }

    public function hiddenInSidebar(): bool
    {
        return (bool) ($this->meta['hideInSidebar'] ?? false);
    }

    /** draft | updated | new | wip — le badge affiché dans la sidebar. */
    public function state(): ?string
    {
        $state = $this->meta['state'] ?? null;

        return is_string($state) && $state !== '' ? $state : null;
    }

    /** Forme attendue par config('sidebar') du site hôte. */
    public function toSidebarItem(): array
    {
        $item = [
            'title' => $this->title(),
            'path' => $this->url(),
            // doc-pagination lit 'slug', la sidebar lit 'path' : les deux
            // existaient déjà sous ces noms, on garde la compatibilité.
            'slug' => $this->url(),
            'description' => (string) ($this->meta['description'] ?? ''),
            'keywords' => (string) ($this->meta['keywords'] ?? ''),
            'seoDescription' => (string) ($this->meta['seoDescription'] ?? $this->meta['description'] ?? ''),
            'tier' => $this->tier()->value,
        ];

        if ($this->state() !== null) {
            $item['state'] = $this->state();
        }

        if ($this->hiddenInSidebar()) {
            $item['hideInSidebar'] = true;
        }

        return $item;
    }

    /** Forme attendue par doc-page-wrapper / doc-pagination. */
    public function toCurrent(): array
    {
        return $this->toSidebarItem();
    }

    public function editUrl(): ?string
    {
        if ($this->root->editUrl === null) {
            return null;
        }

        return rtrim($this->root->editUrl, '/').'/'.ltrim(str_replace($this->root->path.'/', '', $this->file), '/');
    }

    public function compiledView(): string
    {
        return 'fw-content::'.str_replace('/', '.', $this->slug);
    }
}

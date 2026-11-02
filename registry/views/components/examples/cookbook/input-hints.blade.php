{{--
    Des champs qui répondent avant qu'on pose la question : une aide sous le
    champ, une vérification pendant la frappe, un compteur. Une seule ligne
    sous chaque champ, jamais un mur de texte. Le serveur vérifie à nouveau.
--}}
<div x-data="{
        slug: 'atelier-nord',
        email: 'anna@',
        bio: 'Brand and product designer. I run Atelier Nord.',
        taken: ['atelier', 'admin', 'flexiwind'],
        get slugState() {
            if (this.slug === '') return 'empty';
            if (! /^[a-z0-9]+(-[a-z0-9]+)*$/.test(this.slug) || this.slug.length < 3) return 'invalid';
            return this.taken.includes(this.slug) ? 'taken' : 'free';
        },
        get emailState() {
            if (this.email === '') return 'empty';
            return /^[^@\s]+@[^@\s]+\.[a-z]{2,}$/i.test(this.email) ? 'valid' : 'invalid';
        },
    }"
    class="mx-auto flex w-full max-w-sm flex-col gap-5">
    <div class="flex flex-col gap-1.5">
        <div class="flex items-center gap-1">
            <x-ui.label for="hints-slug">Workspace URL</x-ui.label>
            <x-ui.tooltip.trigger tooltip-id="hints-slug-tip" variant="ghost" intent="gray" size="xs" icon-only radius="circle" aria-label="About the workspace URL">
                <x-ui.icon name="ph--question" size="xs" class="text-muted-foreground" />
            </x-ui.tooltip.trigger>
            <x-ui.tooltip id="hints-slug-tip" content="Lowercase letters, numbers and dashes" />
        </div>
        <x-ui.input.group x-bind:class="{ 'border-success!': slugState === 'free', 'border-destructive!': slugState === 'taken' || slugState === 'invalid' }" class="overflow-hidden">
            <x-ui.input.leading class="border-e border-border bg-muted px-2.5 font-mono text-xs text-muted-foreground">flexiwind.app/</x-ui.input.leading>
            <x-ui.input id="hints-slug" variant="unstyled" x-model="slug" autocomplete="off" spellcheck="false"
                aria-describedby="hints-slug-help" x-bind:aria-invalid="slugState === 'taken' || slugState === 'invalid'"
                class="min-w-0 flex-1 bg-transparent px-2.5 text-sm text-title-foreground outline-none" />
            <x-ui.input.trailing class="pe-2.5">
                <x-ui.icon name="ph--check-circle-fill" x-show="slugState === 'free'" class="text-success" />
            </x-ui.input.trailing>
        </x-ui.input.group>
        <p id="hints-slug-help" class="text-xs" aria-live="polite"
            x-bind:class="{ 'text-success': slugState === 'free', 'text-destructive': slugState === 'taken' || slugState === 'invalid', 'text-muted-foreground': slugState === 'empty' }"
            x-text="{
                empty: 'Your team will open the workspace at this address.',
                invalid: 'Use lowercase letters, numbers and single dashes, 3 characters or more.',
                taken: slug + ' is taken. Try ' + slug + '-studio.',
                free: slug + ' is available.',
            }[slugState]"></p>
    </div>

    <div class="flex flex-col gap-1.5">
        <x-ui.label for="hints-email">Work email</x-ui.label>
        <x-ui.input id="hints-email" type="email" x-model="email" autocomplete="email" aria-describedby="hints-email-help"
            x-bind:data-invalid="emailState === 'invalid' ? '' : null" x-bind:aria-invalid="emailState === 'invalid'" />
        <p id="hints-email-help" class="flex items-center gap-1.5 text-xs" aria-live="polite"
            x-bind:class="emailState === 'invalid' ? 'text-destructive' : 'text-muted-foreground'">
            <x-ui.icon name="ph--warning-circle" size="xs" x-show="emailState === 'invalid'" class="shrink-0" />
            <span x-text="emailState === 'invalid' ? 'Add the domain, e.g. ' + (email.split('@')[0] || 'anna') + '@atelier.com' : 'We send the invoices here.'"></span>
        </p>
    </div>

    <div class="flex flex-col gap-1.5">
        <div class="flex items-center justify-between">
            <x-ui.label for="hints-bio">Short bio</x-ui.label>
            <span class="text-xs text-muted-foreground">Optional</span>
        </div>
        <x-ui.textarea id="hints-bio" rows="3" x-model="bio" aria-describedby="hints-bio-help"
            x-bind:data-invalid="bio.length > 160 ? '' : null" />
        <p id="hints-bio-help" class="flex justify-between gap-3 text-xs text-muted-foreground">
            <span>Shown on your public profile.</span>
            <span class="font-mono tabular-nums" x-bind:class="bio.length > 160 && 'text-destructive'" x-text="bio.length + ' / 160'"></span>
        </p>
    </div>
</div>

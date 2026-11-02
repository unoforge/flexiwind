{{--
    Un mot de passe et sa solidité : quatre segments, un mot, une estimation
    du temps qu'il faudrait pour le casser, et la liste des règles qui
    manquent encore. La vérification se fait dans le navigateur ; le serveur
    applique ses propres règles (Password::min(12)->mixedCase()->numbers()->symbols()).
--}}
<div x-data="{
        password: 'flexiwind-2026',
        visible: false,
        get rules() {
            return [
                ['At least 12 characters', this.password.length >= 12],
                ['Upper and lower case', /[a-z]/.test(this.password) && /[A-Z]/.test(this.password)],
                ['A number', /[0-9]/.test(this.password)],
                ['A symbol', /[^A-Za-z0-9]/.test(this.password)],
            ];
        },
        get score() { return this.password === '' ? 0 : this.rules.filter((rule) => rule[1]).length },
        get level() { return this.password === '' ? 'Type a password' : ['Too short', 'Weak', 'Fair', 'Good', 'Strong'][this.score] },
        get time() { return ['', 'Cracked in seconds', 'Cracked in hours', 'Cracked in years', 'Centuries to crack'][this.score] },
        get tone() { return ['text-muted-foreground', 'text-destructive', 'text-warning', 'text-primary', 'text-success'][this.score] },
        get fill() { return ['bg-muted', 'bg-destructive', 'bg-warning', 'bg-primary', 'bg-success'][this.score] },
    }"
    class="mx-auto flex w-full max-w-sm flex-col gap-2.5">
    <x-ui.label for="strength-password">New password</x-ui.label>
    <x-ui.input.group>
        <x-ui.input id="strength-password" variant="unstyled" x-model="password" x-bind:type="visible ? 'text' : 'password'"
            autocomplete="new-password" placeholder="At least 12 characters" aria-describedby="strength-level strength-rules"
            class="min-w-0 flex-1 bg-transparent px-3 text-sm text-title-foreground outline-none" />
        <x-ui.input.trailing clickable class="pe-1">
            <x-ui.button type="button" variant="ghost" intent="gray" size="sm" icon-only x-on:click="visible = ! visible"
                x-bind:aria-label="visible ? 'Hide password' : 'Show password'" x-bind:aria-pressed="String(visible)">
                <span aria-hidden="true" class="iconify size-4" x-bind:class="visible ? 'ph--eye-slash' : 'ph--eye'"></span>
            </x-ui.button>
        </x-ui.input.trailing>
    </x-ui.input.group>

    <div class="mt-0.5 grid grid-cols-4 gap-1" aria-hidden="true">
        <template x-for="segment in 4" :key="segment">
            <span class="h-1.25 rounded-full transition-colors duration-300" x-bind:class="segment <= score ? fill : 'bg-muted'"></span>
        </template>
    </div>
    <p id="strength-level" class="flex justify-between gap-3 text-xs" aria-live="polite">
        <span class="font-medium" x-bind:class="tone" x-text="level"></span>
        <span class="text-muted-foreground" x-text="time"></span>
    </p>

    <x-ui.card size="sm" :shadow="false" class="mt-1.5">
        <ul id="strength-rules" aria-label="Password rules" class="flex flex-col gap-1.75">
            <template x-for="[label, ok] in rules" :key="label">
                <li class="flex items-center gap-2 text-[12.5px] transition-colors" x-bind:class="ok ? 'text-success' : 'text-muted-foreground'">
                    <span aria-hidden="true" class="iconify size-3.5 shrink-0" x-bind:class="ok ? 'ph--check-circle-fill' : 'ph--circle'"></span>
                    <span x-text="label"></span>
                    <span class="sr-only" x-text="ok ? '(done)' : '(missing)'"></span>
                </li>
            </template>
        </ul>
    </x-ui.card>
</div>

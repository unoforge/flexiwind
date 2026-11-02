{{--
    Un e-mail : destinataires en pastilles (Entrée ou virgule ajoute, une
    adresse invalide est refusée), Cc et Bcc à la demande, le texte dans un
    Rich text, des pièces jointes, un brouillon enregistré, un envoi planifié.
    Dans une vraie application, « Send » appelle Livewire et le serveur
    valide les adresses et les fichiers.
--}}
<div x-data="{
        to: [{ name: 'Maria Chen', email: 'maria@globex.test' }],
        cc: [],
        drafts: { to: '', cc: '' },
        copies: false,
        error: '',
        files: [{ name: 'Proposal-v2.pdf', size: '412 KB', type: 'PDF' }],
        status: 'Saved',
        sent: '',
        timer: null,
        initials(person) { return (person.name || person.email).split(/[\s@.]+/).filter(Boolean).slice(0, 2).map((part) => part[0].toUpperCase()).join('') },
        add(list) {
            const value = this.drafts[list].trim().replace(/,$/, '');
            if (value === '') return;
            if (! /^[^@\s]+@[^@\s]+\.[a-z]{2,}$/i.test(value)) { this.error = '“' + value + '” is not a valid address.'; return; }
            if (! this[list].some((person) => person.email === value)) this[list].push({ name: '', email: value });
            this.drafts[list] = ''; this.error = ''; this.touch();
        },
        attach(event) {
            for (const file of event.target.files) {
                this.files.push({ name: file.name, size: file.size > 1048576 ? (file.size / 1048576).toFixed(1) + ' MB' : Math.max(1, Math.round(file.size / 1024)) + ' KB', type: (file.name.split('.').pop() || 'file').slice(0, 4).toUpperCase() });
            }
            event.target.value = ''; this.touch();
        },
        touch() {
            this.status = 'Saving…'; this.sent = '';
            clearTimeout(this.timer);
            this.timer = setTimeout(() => this.status = 'Saved', 700);
        },
        send(when = null) {
            if (! this.to.length) { this.error = 'Add at least one recipient.'; return; }
            this.sent = when ? 'Scheduled for ' + when + '.' : 'Sent to ' + this.to.map((person) => person.name || person.email).join(', ') + '.';
        },
    }"
    x-on:rich-text:change="touch()"
    class="mx-auto w-full max-w-md">
    <x-ui.card class="overflow-hidden [--ui-padding:0px]">
        @foreach (['to' => 'To', 'cc' => 'Cc'] as $list => $title)
            <div @if ($list === 'cc') x-show="copies" x-cloak @endif x-on:click="$refs.{{ $list }}Input.focus()"
                class="flex min-h-11 flex-wrap items-center gap-1.5 border-b border-border px-3 py-1.5 text-[13px]">
                <span class="w-12 shrink-0 text-muted-foreground">{{ $title }}</span>
                <template x-for="(person, index) in {{ $list }}" :key="person.email">
                    {{-- Le style de <x-ui.tag removable> : rayon du thème moins une unité d'espacement. --}}
                    <span data-slot="tag" class="[--tag-radius:calc(var(--radius-ui)-var(--spacing))] inline-flex h-6.5 items-center gap-1.5 rounded-(--tag-radius) border border-border bg-muted ps-0.5 pe-0.5 text-xs font-medium text-title-foreground" x-bind:title="person.email">
                        <span class="ui-soft ui-soft-primary flex size-5 items-center justify-center rounded-[calc(var(--tag-radius)-var(--spacing)*0.5)] text-[9.5px] font-semibold" x-text="initials(person)"></span>
                        <span x-text="person.name || person.email"></span>
                        <button type="button" x-on:click.stop="{{ $list }}.splice(index, 1); touch()" x-bind:aria-label="'Remove ' + (person.name || person.email)"
                            class="flex size-4.5 items-center justify-center rounded-[calc(var(--tag-radius)-var(--spacing)*0.5)] text-muted-foreground transition-colors hover:bg-title-foreground/8 hover:text-title-foreground">
                            <x-ui.icon name="ph--x-bold" size="xs" class="size-3" />
                        </button>
                    </span>
                </template>
                <input x-ref="{{ $list }}Input" type="email" x-model="drafts.{{ $list }}"
                    x-on:keydown.enter.prevent="add('{{ $list }}')" x-on:keydown.comma.prevent="add('{{ $list }}')" x-on:blur="add('{{ $list }}')"
                    x-on:keydown.backspace="drafts.{{ $list }} === '' && {{ $list }}.length && {{ $list }}.pop()"
                    placeholder="Add…" aria-label="{{ $title }} recipients"
                    class="h-7 min-w-24 flex-1 border-0 bg-transparent text-[13px] text-title-foreground outline-none placeholder:text-muted-foreground">
                @if ($list === 'to')
                    <x-ui.button type="button" variant="ghost" intent="gray" size="xs" x-show="! copies" x-on:click.stop="copies = true; $nextTick(() => $refs.ccInput.focus())" class="ms-auto text-muted-foreground">Cc</x-ui.button>
                @endif
            </div>
        @endforeach
        <p x-show="error" x-cloak x-text="error" role="alert" class="border-b border-border bg-destructive/6 px-3 py-1.5 text-xs text-destructive"></p>

        <div class="flex items-center gap-2 border-b border-border px-3 text-[13px]">
            <label for="mail-subject" class="w-12 shrink-0 text-muted-foreground">Subject</label>
            <input id="mail-subject" value="Renewal terms for 2027" x-on:input="touch()"
                class="h-10.5 min-w-0 flex-1 border-0 bg-transparent font-medium text-title-foreground outline-none">
        </div>

        <x-ui.rich-text variant="ghost" placeholder="Write your message…" submit-on="mod-enter"
            value="<p>Hi Maria,</p><p>Here is the updated proposal with the two-year price lock. Happy to walk your finance team through it this week.</p>">
            <x-ui.rich-text.content class="min-h-28 px-3.5! text-[13.5px]/relaxed" />

            <div class="flex flex-wrap gap-1.5 px-3 pb-2.5" x-show="files.length">
                <template x-for="(file, index) in files" :key="file.name + index">
                    <span data-slot="tag" class="[--tag-radius:calc(var(--radius-ui)-var(--spacing))] inline-flex h-7 items-center gap-2 rounded-(--tag-radius) border border-border bg-background ps-2 pe-0.5 text-xs font-medium text-title-foreground">
                        <span class="font-mono text-[10px] font-semibold text-destructive" x-text="file.type"></span>
                        <span class="max-w-36 truncate" x-text="file.name"></span>
                        <span class="font-normal text-muted-foreground" x-text="file.size"></span>
                        <button type="button" x-on:click="files.splice(index, 1); touch()" x-bind:aria-label="'Remove ' + file.name"
                            class="flex size-5 items-center justify-center rounded-[calc(var(--tag-radius)-var(--spacing)*0.5)] text-muted-foreground transition-colors hover:bg-title-foreground/8 hover:text-title-foreground">
                            <x-ui.icon name="ph--x-bold" size="xs" class="size-3" />
                        </button>
                    </span>
                </template>
            </div>

            <x-ui.rich-text.toolbar position="bottom" class="border-t! border-border bg-muted/40 px-2.5!">
                <x-ui.rich-text.button command="bold" />
                <x-ui.rich-text.button command="italic" />
                <x-ui.rich-text.button command="bullet-list" />
                <x-ui.rich-text.button command="link" />
                <label class="inline-flex h-8 min-w-8 cursor-pointer items-center justify-center rounded-[calc(var(--radius-ui)-var(--spacing))] text-muted-foreground hover:bg-muted hover:text-title-foreground" title="Attach files">
                    <span class="sr-only">Attach files</span>
                    <x-ui.icon name="ph--paperclip" class="size-4.5" />
                    <input type="file" multiple class="sr-only" x-on:change="attach($event)">
                </label>

                <span class="ms-auto text-xs text-muted-foreground" aria-live="polite" x-text="sent || status"></span>

                <div class="ms-2 flex">
                    <x-ui.button type="button" size="sm" x-on:click="send()" class="rounded-e-none">Send</x-ui.button>
                    <x-ui.dropdown.trigger dropdown-id="mail-send-later" variant="solid" :intent="null" size="sm" icon-only aria-label="Schedule send" class="rounded-s-none border-s border-white/25">
                        <x-ui.icon name="ph--caret-down" size="xs" />
                    </x-ui.dropdown.trigger>
                    <x-ui.dropdown id="mail-send-later" placement="top-end" class="w-60">
                        <x-ui.dropdown.header>Send later</x-ui.dropdown.header>
                        @foreach (['Tomorrow morning' => '8:00', 'Monday' => '9:00'] as $day => $hour)
                            <x-ui.dropdown.item x-on:click="send('{{ $day }}, {{ $hour }}')">
                                <x-ui.dropdown.icon><x-ui.icon name="ph--clock" /></x-ui.dropdown.icon>
                                <x-ui.dropdown.label>{{ $day }}</x-ui.dropdown.label>
                                <x-ui.dropdown.kbd>{{ $hour }}</x-ui.dropdown.kbd>
                            </x-ui.dropdown.item>
                        @endforeach
                    </x-ui.dropdown>
                </div>
            </x-ui.rich-text.toolbar>
        </x-ui.rich-text>
    </x-ui.card>
</div>

{{--
    Un éditeur de texte riche, sans dépendance : marques, titres, listes,
    citation, code, liens et images. Chaque partie est un composant, la
    composition est la vôtre.

    <x-ui.rich-text wire:model="body" label="Body" />
    <x-ui.rich-text wire:model="body" toolbar="full" bubble :max="2000" />
    <x-ui.rich-text wire:model="body" upload="photo" store="storePhoto" />

    <x-ui.rich-text wire:model="body" variant="detached">
        <x-ui.rich-text.toolbar>
            <x-ui.rich-text.blocks />
            <x-ui.rich-text.separator />
            <x-ui.rich-text.button command="bold" />
            <x-ui.rich-text.button command="link" />
        </x-ui.rich-text.toolbar>
        <x-ui.rich-text.content class="min-h-48" />
    </x-ui.rich-text>

    Le HTML est nettoyé dans le navigateur ; nettoyez-le encore sur le serveur :
    App\Flexiwind\RichText::clean($this->body).
    Moteur : Alpine.data('fwRichText'), resources/js/plugins/rich-text.js.
--}}
@props([
    'label' => null,
    'name' => null,
    'value' => '',
    'placeholder' => 'Write something…',
    'variant' => 'default',
    'toolbar' => 'basic',
    'bubble' => false,
    'count' => false,
    'max' => null,
    'upload' => null,
    'store' => null,
    'accept' => 'image/png,image/jpeg,image/webp,image/gif',
    'maxSize' => '5MB',
    'markdown' => true,
    'submitOn' => null,
    'hint' => null,
    'disabled' => false,
    'invalid' => false,
    'texts' => [],
])

@php
    $model = $attributes->wire('model')->value();
    $id = $attributes->get('id') ?? 'rich-text-'.\Illuminate\Support\Str::slug($name ?? $model ?? 'editor').'-'.substr(md5((string) json_encode([$name, $model, $label])), 0, 6);
    $errorKey = $model ?: ($name ? str_replace(['[]', '[', ']'], ['', '.', ''], $name) : null);
    $error = $errorKey && isset($errors) ? $errors->first($errorKey) : '';
    $isInvalid = $invalid || $error !== '';
    $variant = in_array($variant, ['default', 'inset', 'detached', 'ghost'], true) ? $variant : 'default';
    $maxBytes = \App\Flexiwind\FileRules::bytes($maxSize);
    $initial = \App\Flexiwind\RichText::clean($name ? old($errorKey, $value) : $value);
    $hasSlot = trim((string) $slot) !== '';
    $preset = $toolbar === false || $toolbar === 'none' ? null : (in_array($toolbar, ['minimal', 'basic', 'full'], true) ? $toolbar : 'basic');
@endphp

<div data-slot="rich-text" id="{{ $id }}" data-variant="{{ $variant }}" @if ($isInvalid) data-invalid @endif @if ($disabled) data-disabled @endif
    x-data="fwRichText(@js([
        'value' => $initial,
        'upload' => $upload,
        'store' => $store ?? ($upload ? 'store'.\Illuminate\Support\Str::studly($upload) : null),
        'accept' => \App\Flexiwind\FileRules::accept($accept),
        'maxBytes' => $maxBytes,
        'maxLabel' => $maxBytes === null ? null : \App\Flexiwind\FileRules::human($maxBytes),
        'max' => $max ? (int) $max : null,
        'markdown' => (bool) $markdown,
        'submitOn' => in_array($submitOn, ['enter', 'mod-enter'], true) ? $submitOn : null,
        'disabled' => (bool) $disabled,
        'invalid' => $isInvalid,
        'placeholder' => $placeholder,
        'texts' => array_map('strval', $texts),
    ]))"
    x-modelable="value"
    {{ $attributes->except(['id'])->class(['group/rich-text relative flex w-full min-w-0 flex-col gap-2']) }}>
    @if ($label)
        <x-ui.label for="{{ $id }}-content" :text="$label" />
    @endif

    <div data-slot="rich-text-frame" wire:ignore
        x-on:dragenter="dragenter($event)" x-on:dragover.prevent x-on:dragleave="dragleave()" x-on:drop="drop($event)"
        x-on:keydown.escape="panel && closePanel()"
        @class([
            'relative flex min-w-0 flex-col',
            'rounded-ui border border-border-input bg-background transition-[border-color,box-shadow] duration-200',
            'has-[[data-rt-content]:focus]:border-(--ui-input-focus-outline) has-[[data-rt-content]:focus]:ring-3 has-[[data-rt-content]:focus]:ring-(--focus-ring)' => true,
            'group-data-invalid/rich-text:border-(--ui-input-invalid-outline)',
            'p-1.5 rounded-[calc(var(--radius-ui)+--spacing(1.5))] bg-muted/50' => $variant === 'inset',
            'border-0! bg-transparent! ring-0! gap-2' => $variant === 'detached',
            'border-0! bg-transparent! ring-0! rounded-none' => $variant === 'ghost',
            'pointer-events-none opacity-60' => $disabled,
        ])>
        @if ($hasSlot)
            {{ $slot }}
        @else
            @if ($preset)
                <x-ui.rich-text.toolbar>
                    @if ($preset === 'full')
                        <x-ui.rich-text.group>
                            <x-ui.rich-text.button command="undo" />
                            <x-ui.rich-text.button command="redo" />
                        </x-ui.rich-text.group>
                        <x-ui.rich-text.separator />
                        <x-ui.rich-text.blocks />
                        <x-ui.rich-text.separator />
                    @endif
                    <x-ui.rich-text.group>
                        <x-ui.rich-text.button command="bold" />
                        <x-ui.rich-text.button command="italic" />
                        @if ($preset !== 'minimal')
                            <x-ui.rich-text.button command="underline" />
                            <x-ui.rich-text.button command="strike" />
                        @endif
                        @if ($preset === 'full')
                            <x-ui.rich-text.button command="code" />
                        @endif
                    </x-ui.rich-text.group>
                    @if ($preset !== 'minimal')
                        <x-ui.rich-text.separator />
                        <x-ui.rich-text.group>
                            <x-ui.rich-text.button command="bullet-list" />
                            <x-ui.rich-text.button command="ordered-list" />
                            <x-ui.rich-text.button command="quote" />
                        </x-ui.rich-text.group>
                    @endif
                    @if ($preset === 'full')
                        <x-ui.rich-text.separator />
                        <x-ui.rich-text.group>
                            <x-ui.rich-text.button command="align-left" />
                            <x-ui.rich-text.button command="align-center" />
                            <x-ui.rich-text.button command="align-right" />
                        </x-ui.rich-text.group>
                    @endif
                    <x-ui.rich-text.separator />
                    <x-ui.rich-text.group>
                        <x-ui.rich-text.button command="link" />
                        @if ($preset === 'full' || $upload)
                            <x-ui.rich-text.button command="image" />
                        @endif
                        @if ($preset === 'full')
                            <x-ui.rich-text.button command="clear" />
                        @endif
                    </x-ui.rich-text.group>
                </x-ui.rich-text.toolbar>
            @endif

            <x-ui.rich-text.content />

            @if ($bubble)
                <x-ui.rich-text.bubble />
            @endif

            @if ($count || $max)
                <x-ui.rich-text.footer>
                    <x-ui.rich-text.count />
                </x-ui.rich-text.footer>
            @endif
        @endif

        {{-- Lien : un champ, Entrée applique, une adresse vide retire le lien. --}}
        <div data-rt-panel="link" role="dialog" aria-label="{{ $texts['linkLabel'] ?? 'Link address' }}" x-cloak x-show="panel === 'link'" x-on:keydown.enter.prevent="applyLink()" x-on:click.outside="panel === 'link' && ! $event.target.closest('[data-command=link]') && closePanel(false)"
            x-bind:style="{ left: panelPos.x + 'px', top: panelPos.y + 'px' }"
            class="absolute z-40 flex w-75 items-center gap-1.5 rounded-ui border border-border bg-background p-1.5 shadow-sm">
            <input type="text" inputmode="url" x-model="linkUrl" placeholder="https://" aria-label="{{ $texts['linkLabel'] ?? 'Link address' }}"
                class="h-8 min-w-0 flex-1 rounded-[calc(var(--radius-ui)-var(--spacing))] border border-border-input bg-background px-2.5 text-sm text-title-foreground outline-none focus:border-(--ui-input-focus-outline)">
            <button type="button" x-on:click="applyLink()" class="h-8 shrink-0 rounded-[calc(var(--radius-ui)-var(--spacing))] bg-primary px-3 text-xs font-medium text-white">{{ $texts['apply'] ?? 'Apply' }}</button>
        </div>

        {{-- Image : envoi (avec Livewire et `upload`) ou adresse. --}}
        <div data-rt-panel="image" role="dialog" aria-label="{{ $texts['imageLabel'] ?? 'Insert image' }}" x-cloak x-show="panel === 'image'" x-on:click.outside="panel === 'image' && ! $event.target.closest('[data-command=image]') && closePanel(false)"
            x-data="{ tab: @js($upload ? 'upload' : 'link') }"
            x-bind:style="{ left: panelPos.x + 'px', top: panelPos.y + 'px' }"
            class="absolute z-40 flex w-80 flex-col gap-2.5 rounded-ui border border-border bg-background p-2.5 shadow-sm">
            @if ($upload)
                <div role="tablist" class="flex gap-1 rounded-[calc(var(--radius-ui)-var(--spacing))] bg-muted p-0.5 text-xs font-medium">
                    <button type="button" role="tab" x-on:click="tab = 'upload'" :aria-selected="String(tab === 'upload')"
                        class="h-7 flex-1 rounded-[calc(var(--radius-ui)-var(--spacing)*1.5)] text-muted-foreground aria-selected:bg-background aria-selected:text-title-foreground aria-selected:shadow-xs">{{ $texts['uploadTab'] ?? 'Upload' }}</button>
                    <button type="button" role="tab" x-on:click="tab = 'link'; $nextTick(() => $refs.imageUrl.focus())" :aria-selected="String(tab === 'link')"
                        class="h-7 flex-1 rounded-[calc(var(--radius-ui)-var(--spacing)*1.5)] text-muted-foreground aria-selected:bg-background aria-selected:text-title-foreground aria-selected:shadow-xs">{{ $texts['linkTab'] ?? 'Link' }}</button>
                </div>
                <button type="button" x-show="tab === 'upload'" x-on:click="browse()"
                    class="flex flex-col items-center gap-2 rounded-ui border-[1.5px] border-dashed border-border-strong px-4 py-5 text-center text-sm transition-colors hover:border-muted-foreground/50">
                    <span aria-hidden="true" class="flex size-9 items-center justify-center rounded-ui border border-border text-title-foreground"><span class="iconify ph--upload-simple size-4.5"></span></span>
                    <span class="font-medium text-title-foreground">{{ $texts['drop'] ?? 'Drop images or browse' }}</span>
                    <span class="text-xs text-muted-foreground">{{ $texts['rules'] ?? 'PNG, JPG, WebP or GIF'.($maxBytes ? ' · up to '.\App\Flexiwind\FileRules::human($maxBytes) : '') }}</span>
                </button>
            @endif
            <div x-show="tab === 'link'" x-on:keydown.enter.prevent="insertImageUrl()" class="flex flex-col gap-2">
                <input type="text" inputmode="url" x-ref="imageUrl" x-model="imageUrl" placeholder="https://…/photo.jpg" aria-label="{{ $texts['imageUrl'] ?? 'Image address' }}"
                    class="h-8 rounded-[calc(var(--radius-ui)-var(--spacing))] border border-border-input bg-background px-2.5 text-sm text-title-foreground outline-none focus:border-(--ui-input-focus-outline)">
                <input type="text" x-model="imageAlt" placeholder="{{ $texts['altPlaceholder'] ?? 'Alt text, for screen readers' }}" aria-label="{{ $texts['altLabel'] ?? 'Alt text' }}"
                    class="h-8 rounded-[calc(var(--radius-ui)-var(--spacing))] border border-border-input bg-background px-2.5 text-sm text-title-foreground outline-none focus:border-(--ui-input-focus-outline)">
                <button type="button" x-on:click="insertImageUrl()" class="h-8 rounded-[calc(var(--radius-ui)-var(--spacing))] bg-primary text-xs font-medium text-white">{{ $texts['insert'] ?? 'Insert image' }}</button>
            </div>
            <p x-show="error" x-text="error" class="text-xs text-destructive"></p>
        </div>

        {{-- Outils de l'image cliquée. --}}
        <div data-rt-image-bar x-cloak x-show="image" x-on:click.outside="if (! $event.target.closest('img')) image = null"
            x-bind:style="{ left: imageBar.x + 'px', top: imageBar.y + 'px' }"
            class="absolute z-30 flex items-center gap-0.5 rounded-ui border border-border bg-background p-1 shadow-sm">
            @foreach ([['left', 'ph--text-align-left', $texts['floatLeft'] ?? 'Float left'], ['center', 'ph--text-align-center', $texts['center'] ?? 'Center'], ['wide', 'ph--arrows-out-line-horizontal', $texts['fullWidth'] ?? 'Full width']] as [$align, $icon, $text])
                <button type="button" x-on:mousedown.prevent x-on:click="imageAlign(@js($align))" :aria-pressed="String(imageAligned(@js($align)))" aria-label="{{ $text }}" title="{{ $text }}"
                    class="flex size-7 items-center justify-center rounded-[calc(var(--radius-ui)-var(--spacing))] text-muted-foreground hover:bg-muted hover:text-title-foreground aria-pressed:bg-muted aria-pressed:text-title-foreground">
                    <span aria-hidden="true" class="iconify {{ $icon }} size-4"></span>
                </button>
            @endforeach
            <span aria-hidden="true" class="mx-0.5 h-4 w-px bg-border"></span>
            @foreach ([['imageAltText()', 'ph--text-aa', $texts['alt'] ?? 'Alt text'], ['imageCaption()', 'ph--subtitles', $texts['caption'] ?? 'Caption'], ['imageRemove()', 'ph--trash', $texts['remove'] ?? 'Remove image']] as [$action, $icon, $text])
                <button type="button" x-on:mousedown.prevent x-on:click="{{ $action }}" aria-label="{{ $text }}" title="{{ $text }}"
                    class="flex size-7 items-center justify-center rounded-[calc(var(--radius-ui)-var(--spacing))] text-muted-foreground hover:bg-muted hover:text-title-foreground">
                    <span aria-hidden="true" class="iconify {{ $icon }} size-4"></span>
                </button>
            @endforeach
        </div>

        @if ($upload)
            <div x-cloak x-show="over" aria-hidden="true"
                class="pointer-events-none absolute inset-1.5 z-30 flex flex-col items-center justify-center gap-1.5 rounded-[calc(var(--radius-ui)-var(--spacing))] border-2 border-dashed border-primary bg-primary/8 text-sm font-medium text-primary backdrop-blur-[1px]">
                <span class="iconify ph--upload-simple size-5"></span>
                {{ $texts['over'] ?? 'Drop images to insert them here' }}
            </div>
            <input type="file" data-rt-picker hidden multiple accept="{{ $accept }}" x-on:change="picked($event)" tabindex="-1">
        @endif
    </div>

    <p wire:ignore x-cloak x-show="error && panel !== 'image'" x-text="error" role="alert" class="text-xs text-destructive"></p>
    @if ($error)
        <p class="text-xs text-destructive">{{ $error }}</p>
    @elseif ($hint)
        <p class="text-xs text-muted-foreground">{{ $hint }}</p>
    @endif

    @if ($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="value" value="{{ $initial }}" wire:ignore>
    @endif

    <div class="sr-only" aria-live="polite" x-text="announcement" wire:ignore></div>
</div>

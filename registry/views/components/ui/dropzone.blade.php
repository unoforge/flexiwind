{{--
    Une zone où déposer des fichiers ; un clic, Entrée ou Espace ouvre aussi
    le sélecteur. Mêmes règles que <x-ui.file-trigger> : seuls les fichiers
    acceptés partent, et le serveur valide à nouveau.

    <x-ui.dropzone wire:model="attachments" multiple accept="image/png,image/jpeg,.pdf" max-size="10MB" />
--}}
@props([
    'name' => null,
    'label' => null,
    'accept' => null,
    'multiple' => false,
    'maxSize' => null,
    'maxFiles' => null,
    'hint' => null,
    'title' => 'Drop files here or :browse',
    'browseText' => 'browse',
    'overText' => 'Release to add the files',
    'showFiles' => true,
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'removeLabel' => 'Remove :name',
    'texts' => [],
])

@php
    $model = $attributes->wire('model')->value();
    $id = $attributes->get('id') ?? 'dropzone-'.\Illuminate\Support\Str::slug($name ?? $model ?? 'files').'-'.substr(md5((string) json_encode([$name, $model, $accept, $label])), 0, 6);
    $config = \App\Flexiwind\FileRules::config($accept, $maxSize, $maxFiles, (bool) $multiple, $model, $removeLabel, $texts);
    $errorKey = $model ?: ($name ? str_replace(['[]', '[', ']'], ['', '.', ''], $name) : null);
    $error = $errorKey && isset($errors) ? ($errors->first($errorKey) ?: $errors->first($errorKey.'.*')) : '';
    $isInvalid = $invalid || $error !== '';
    [$before, $after] = array_pad(explode(':browse', e($title), 2), 2, '');
@endphp

<div data-slot="dropzone" id="{{ $id }}" x-data="fwFiles(@js($config))" @if ($isInvalid) data-invalid @endif
    {{ $attributes->whereDoesntStartWith('wire:model')->except(['id'])->class(['group/dropzone flex w-full min-w-0 flex-col gap-2']) }}>
    @if ($label)
        <span id="{{ $id }}-label" class="text-sm font-medium text-title-foreground">{{ $label }}</span>
    @endif

    <div role="button" @if ($disabled) aria-disabled="true" tabindex="-1" @else tabindex="0" @endif
        @if ($label) aria-labelledby="{{ $id }}-label {{ $id }}-title" @endif
        aria-describedby="{{ $id }}-hint"
        x-on:click="browse()" x-on:keydown.enter.prevent="browse()" x-on:keydown.space.prevent="browse()"
        x-on:dragenter.prevent="dragEnter($event)" x-on:dragover.prevent x-on:dragleave="dragLeave()" x-on:drop.prevent="drop($event)"
        x-bind:data-over="over ? '' : null"
        @class([
            'group/zone flex w-full flex-col items-center justify-center gap-2.5 rounded-ui border-[1.5px] border-dashed border-border-strong bg-background text-center',
            'transition-colors duration-150 outline-2 outline-offset-2 outline-transparent focus-visible:outline-(--ui-input-focus-outline)',
            'data-over:border-primary data-over:bg-primary/8',
            'group-data-invalid/dropzone:border-(--ui-input-invalid-outline)',
            'px-5 py-7' => $size !== 'sm',
            'flex-row px-4 py-3.5' => $size === 'sm',
            'cursor-not-allowed opacity-60' => $disabled,
            'cursor-pointer enabled:hover:border-muted-foreground/50' => ! $disabled,
        ])>
        @if ($size !== 'sm')
            <span aria-hidden="true" class="flex size-10 items-center justify-center rounded-ui border border-border bg-background text-title-foreground shadow-xs group-data-over/zone:border-primary/35 group-data-over/zone:text-primary">
                <span class="flex size-4.5 iconify ph--cloud-arrow-up group-data-over/zone:hidden"></span>
                <span class="hidden size-4.5 iconify ph--upload-simple group-data-over/zone:flex"></span>
            </span>
        @endif
        <span id="{{ $id }}-title" class="text-sm font-medium text-title-foreground group-data-over/zone:hidden">{!! $before !!}<span class="text-primary underline decoration-primary/40 underline-offset-3">{{ $browseText }}</span>{!! $after !!}</span>
        <span class="hidden text-sm font-medium text-primary group-data-over/zone:inline">{{ $overText }}</span>
        @if ($hint && $size !== 'sm')
            <span id="{{ $id }}-hint" class="text-xs text-muted-foreground">{{ $hint }}</span>
        @else
            <span id="{{ $id }}-hint" class="sr-only">{{ $hint }}</span>
        @endif
    </div>

    <input type="file" x-ref="picker" hidden tabindex="-1" aria-hidden="true" x-on:change="pick($event.target.files)"
        @if ($accept) accept="{{ $accept }}" @endif
        @if ($multiple) multiple @endif
        @if ($disabled) disabled @endif>
    <input type="file" x-ref="model" hidden tabindex="-1" aria-hidden="true"
        @if ($name) name="{{ $name }}{{ $multiple && ! str_ends_with($name, '[]') ? '[]' : '' }}" @endif
        @if ($multiple) multiple @endif
        {{ $attributes->whereStartsWith('wire:model') }}>

    @if ($showFiles)
        <x-ui.file-trigger.files />
    @endif

    @if ($error !== '')
        <p class="flex items-center gap-1.5 text-xs text-destructive" role="alert">
            <span aria-hidden="true" class="flex size-3.5 shrink-0 iconify ph--warning-circle"></span>{{ $error }}
        </p>
    @endif
</div>

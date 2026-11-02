{{--
    N'importe quel bouton ouvre le sélecteur de fichiers.

    <x-ui.file-trigger wire:model="invoice" accept=".pdf" max-size="10MB">
        <x-ui.button variant="outline">Upload file</x-ui.button>
    </x-ui.file-trigger>

    Deux inputs cachés : celui qu'ouvre le bouton, et celui que lisent
    Livewire ou le formulaire (`wire:model`, `name`). Seuls les fichiers
    acceptés passent du premier au second : un fichier refusé n'est jamais
    envoyé. Le serveur valide quand même : `accept` et `max-size` ne font
    qu'aider. Moteur : Alpine.data('fwFiles'), resources/js/plugins/files.js.
--}}
@props([
    'name' => null,
    'accept' => null,
    'multiple' => false,
    'directory' => false,
    'capture' => null,
    'maxSize' => null,
    'maxFiles' => null,
    'showFiles' => true,
    'disabled' => false,
    'removeLabel' => 'Remove :name',
    'texts' => [],
])

@php
    $model = $attributes->wire('model')->value();
    $id = $attributes->get('id') ?? 'file-trigger-'.\Illuminate\Support\Str::slug($name ?? $model ?? 'file').'-'.substr(md5((string) json_encode([$name, $model, $accept])), 0, 6);
    $config = \App\Flexiwind\FileRules::config($accept, $maxSize, $maxFiles, (bool) $multiple, $model, $removeLabel, $texts);
@endphp

<div data-slot="file-trigger" id="{{ $id }}" x-data="fwFiles(@js($config))"
    {{ $attributes->whereDoesntStartWith('wire:model')->except(['id'])->class(['flex flex-col gap-2']) }}>
    <div class="contents" x-on:click="openFrom($event)">{{ $slot }}</div>

    <input type="file" x-ref="picker" hidden tabindex="-1" aria-hidden="true" x-on:change="pick($event.target.files)"
        @if ($accept) accept="{{ $accept }}" @endif
        @if ($multiple) multiple @endif
        @if ($directory) webkitdirectory @endif
        @if ($capture) capture="{{ $capture }}" @endif
        @if ($disabled) disabled @endif>
    <input type="file" x-ref="model" hidden tabindex="-1" aria-hidden="true"
        @if ($name) name="{{ $name }}{{ $multiple && ! str_ends_with($name, '[]') ? '[]' : '' }}" @endif
        @if ($multiple) multiple @endif
        {{ $attributes->whereStartsWith('wire:model') }}>

    @if ($showFiles)
        <x-ui.file-trigger.files />
    @endif
</div>

{{-- Les champs cachés d'un formulaire classique : un par valeur. --}}
@props(['name' => null])

@if ($name)
    <div wire:ignore hidden>
        <template x-for="(item, index) in formValues" :key="index">
            <input type="hidden" :name="inputName" :value="item">
        </template>
    </div>
@endif

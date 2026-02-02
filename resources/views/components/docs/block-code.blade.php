@props([
  'title',
  'icon' => null,
  'shellStyle' => null,
])

@php
    $iconVal = null;

    if($icon){
        $iconVal = \App\Helpers\CodeIcon::get($icon);
    }
@endphp


  <div class="flex justify-between items-center pl-3.5 pr-2.5 pb-1.5 pt-px">
    <div class="flex items-center gap-x-3">
      @if ($iconVal)
        @if (\App\Helpers\CodeIcon::isFile($iconVal))
          <img
            src="{{ '/icons/' . $iconVal }}"
            alt="icon {{ $icon }}"
            width="20"
            class="h-4 w-auto"
          />
        @else
          <span aria-hidden="true" class="flex iconify {{ $iconVal }}"></span>
        @endif
      @endif
      {{ $title }}
    </div>
    <div class="flex items-center text-gray-200">
      <x-atoms.btn-copy-code />
    </div>
  </div>
  <div class="relative group overflow-hidden max-h-[35rem] bg-(--astro-code-color-background) border border-gray-700 dark:border-gray-800 inner-radius w-full grid">
    <div
      data-shell-indicator="{{ $shellStyle ? 'true' : 'false' }}"
      data-code-snippet
      class="grid overflow-hidden"
    >
      {{ $slot }}
    </div>
  </div>
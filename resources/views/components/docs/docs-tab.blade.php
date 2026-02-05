@props([
    'values' => [],
    'docPanelClass' => '',
    'class' => '',
    'triggersClass' => '',
    'tabList' => '',
    'tabListContainer' => '',
])

<div x-tabs data-tab-fx-site data-fx-tabs
    {{ $attributes->merge(['class' => 'mt-5 first:mt-0 grid ' . ($class ?? '')]) }}>
    <div data-gen-ignore data-tab-list-wrapper class="w-full {{ $tabListContainer !== '' ? $tabListContainer : '' }}">
        <ul role="tablist" data-tab-list
            class="flex items-center gap-x-3 {{ $tabList !== '' ? $tabList : 'border-b border-border-strong/60 relative text-fg-muted' }}">
            @foreach ($values as $value)
                @if (is_string($value))
                    <li role="presentation" class="flex">
                        <a data-tabs-trigger data-target="{{ $value }}" href="#{{ $value }}" role="tab"
                            aria-controls="{{ $value }}" aria-label="{{ $value }}"
                            class="relative flex disabled:cursor-not-allowed disabled:opacity-80 fx-active:text-fg-title outline-none focus:outline-0 focus:outline-transparent focus-visible:outline focus-visible:outline-primary {{ $triggersClass !== '' ? $triggersClass : 'px-4 pt-1.5 pb-2.5' }}">
                            {{ $value }}
                        </a>
                    </li>
                @elseif(is_array($value))
                    <li role="presentation" class="flex">
                        <a data-tabs-trigger data-target="{{ $value['value'] ?? '' }}"
                            href="#{{ $value['value'] ?? '' }}" role="tab"
                            aria-controls="{{ $value['value'] ?? '' }}" aria-label="{{ $value['value'] ?? '' }}"
                            class="relative flex items-center disabled:cursor-not-allowed disabled:opacity-80 fx-active:text-fg-title outline-none focus:outline-0 focus:outline-transparent focus-visible:outline focus-visible:outline-primary {{ $triggersClass !== '' ? $triggersClass : 'px-4 pt-1.5 pb-2.5' }}">
                            @if (isset($value['icon']) && $value['icon'] !== '')
                                <span aria-hidden="true" class="iconify text-sm mr-2 {{ $value['icon'] ?? '' }}"></span>
                            @endif
                            <span>{{ $value['text'] ?? '' }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
    <div data-panels-container class="w-full flex{{ $docPanelClass ? ' ' . $docPanelClass : ' pt-5 ' }}">
        {{ $slot }}
    </div>
</div>

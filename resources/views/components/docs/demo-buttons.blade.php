@props(['variant' => 'solid'])
<div class="flex flex-wrap items-center gap-2.5 justify-center">
    <x-ui.button :variant="$variant" intent="primary">
        Primary
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="secondary">
        Secondary
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="accent">
        Accent
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="success">
        Success
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="warning">
        Warning
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="info">
        Info
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="danger">
        Danger
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="gray">
        Gray
    </x-ui.button>
    <x-ui.button :variant="$variant" intent="neutral">
        Neutral
    </x-ui.button>
    @if ($variant == 'solid' || $variant == 'flexi')
        <x-ui.button :variant="$variant" intent="white">
            White
        </x-ui.button>
    @endif
</div>

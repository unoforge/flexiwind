@php
    use App\Flexiwind\ButtonHelper;

    // La matrice est lue depuis le helper : cette table ne peut plus mentir
    // sur ce qui existe, même si la matrice évolue.
    $matrix = ButtonHelper::getVariants();

    $variants = ['solid', 'outline', 'soft', 'ghost'];

    $intents = [
        'primary' => 'Primary',
        'secondary' => 'Secondary',
        'accent' => 'Accent',
        'success' => 'Success',
        'info' => 'Info',
        'warning' => 'Warning',
        'danger' => 'Danger',
        'gray' => 'Gray',
        'neutral' => 'Neutral',
        'white' => 'White',
    ];

    $supports = fn (string $variant, string $intent): bool => isset(
        $matrix[$variant]['intents'][ButtonHelper::normalizeIntent($intent)]
    );
@endphp

<div>
    <div class="grid grid-cols-[auto_minmax(0,1fr)] gap-4 overflow-hidden">
        <div class="grid text-sm text-muted-foreground mt-14 pl-3 sm:pl-0">
            @foreach ($intents as $label)
                <div class="flex items-center h-12">{{ $label }}</div>
            @endforeach
        </div>
        <div class="grid overflow-hidden">
            <div data-invisible-scrollbar class="grid overflow-x-auto">
                <div class="grid grid-cols-4 gap-4 px-4 text-sm text-muted-foreground pb-3">
                    @foreach ($variants as $variant)
                        <div>{{ ucfirst($variant) }}</div>
                    @endforeach
                </div>
                <div class="p-4 rounded-md border border-border-strong/60 gap-4 grid min-w-max">
                    @foreach ($intents as $intent => $label)
                        <div class="grid grid-cols-4 gap-4 items-center h-12">
                            @foreach ($variants as $variant)
                                <div class="flex items-center">
                                    @if ($supports($variant, $intent))
                                        <x-ui.button size="sm" :variant="$variant" :intent="$intent">
                                            Click Me
                                        </x-ui.button>
                                    @else
                                        <span
                                            class="text-muted-foreground/60"
                                            title="{{ $variant }} + {{ $intent }} : aucune utility définie"
                                        >-</span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@php
$features = [
    'Advanced Analytics',
    'Custom Branding',
    'Priority Support',
    'API Integration',
    'Team Collaboration',
];
@endphp

<x-ui.card class="md:[--card-padding:--spacing(8)] max-w-sm">
    <span class="text-fg-title font-bold text-xl">Enterprise Plan</span>
    <p class="text-fg my-6">
        Perfect for growing businesses that need powerful features and dedicated support.
    </p>
    <div class="flex items-end gap-4 py-4 border-y border-border-strong/50">
        <span
            class="bg-clip-text text-transparent bg-gradient-to-br from-primary-500 to-accent-400 font-bold text-4xl">
            $999
        </span>
        <x-ui.badge variant="soft" intent="primary">
            annual
        </x-ui.badge>
    </div>
    <ul class="flex flex-col gap-y-3 *:flex *:items-center *:gap-x-4 py-8">
        @foreach ($features as $feature)
            <li>
                <span aria-hidden="true" class="flex iconify ph--folder-open text-primary size-4"></span>
                {{ $feature }}
            </li>
        @endforeach
    </ul>
    <x-ui.button href="#pricing" class="w-full justify-center">
        Start Free Trial
    </x-ui.button>
</x-ui.card>
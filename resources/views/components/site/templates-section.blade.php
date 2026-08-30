@php
    $templates = [
        [
            'cover' => [
                'light' => '/images/crm-template.webp',
                'dark' => '/images/crm-template-dark.webp',
            ],
            'links' => [
                'source' => 'https://johnkat-mj.mychariow.shop/laravel-crm-template',
            ],
            'title' => 'CRM SaaS Template',
            'description' => 'A light CRM template',
            'isFree' => false,
        ],
        [
            'cover' => [
                'light' => '/images/starter.webp',
                'dark' => '/images/starter-dark.webp',
            ],
            'links' => [
                'source' => 'https://github.com/uno-forge-hub/livewire-tail-starter-kit',
            ],
            'title' => 'Livewire Starter',
            'description' => 'Full laravel 13 + livewire Starter',
            'isFree' => true,
        ],
    ];
@endphp
<section>
    <div class="mx-auto w-full lg:max-w-300 border-x border-border-strong/70 border-dashed">
        <div
            class="py-8 sm:py-16 px-3.5 sm:px-8 md:px-16 lg:px-8 xl:px-0 mx-auto w-full max-w-3xl lg:max-w-5xl grid sm:grid-cols-2 gap-6">
            @foreach ($templates as $template)
                <div class="relative">
                    <div class="bg-muted rounded-ui aspect-standard-tv overflow-hidden relative group z-4 ring ring-border/40">
                        <img src="{{ $template['cover']['light'] }}" alt="Cover light template" width="1911"
                            height="1433" class="size-full object-cover rounded-ui dark:hidden ease-linear duration-300 group-hover:scale-105">
                        <img src="{{ $template['cover']['dark'] }}" alt="Cover light template" width="1911"
                            height="1433" class="size-full object-cover rounded-ui hidden dark:flex ease-linear duration-300 group-hover:scale-105">
                        <div
                            class="absolute inset-x-1 bottom-1 p-4 backdrop-filter backdrop-blur-md bg-gray-100/70 dark:bg-gray-950/70 rounded-[calc(var(--radius-ui)---spacing(1))] flex justify-center gap-x-1 duration-300 ease-linear transition opacity-0 group-hover:opacity-100 ">
                            @if (isset($template['links']['preview']))
                                <x-ui.link href="{{ $template['links']['preview'] }}"
                                    class="btn btn-sm btn-outline btn-outline-gray rounded-ui gap-2">
                                    <x-ui.icon name="ph--eye" />
                                    Preview
                                </x-ui.link>
                            @endif
                            <x-ui.link href="{{ $template['links']['source'] }}" as-button size="sm" intent="neutral"
                                class="gap-2">
                                <x-ui.icon name="{{ $template['isFree'] ? 'ph--github-logo':'ph--download' }}" />
                                Download
                            </x-ui.link>
                        </div>
                    </div>
                    <div class="pt-3 px-3 flex flex-col flex-1">
                        <h3 class="flex items-center justify-between gap-3 flex-1">
                            <x-ui.link href="{{ $template['links']['source'] }}" class="font-semibold text-lg text-foreground before:absolute before:inset-0">
                                {{ $template['title'] }}
                            </x-ui.link>
                            <x-ui.badge size="sm" intent="{{ $template['isFree'] ? 'gray' : 'neutral' }}">
                                @if ($template['isFree'])
                                    Free
                                @else
                                    Paid
                                @endif
                            </x-ui.badge>
                        </h3>
                        <p class="text-sm text-muted-foreground">
                            {{ $template['description'] }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="h-4 linear-gradient-pattern border-y border-dashed border-border-strong/70"></div>
    </div>
</section>

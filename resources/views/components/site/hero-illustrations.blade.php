<div class="relative lg:mx-auto w-full lg:max-w-310 -mt-16 sm:-mt-30 md:-mt-66 overflow-hidden">
    <div
        class="relative z-11 flex items-center gap-2 h-20 px-5 bg-bg ml-auto w-max max-md:hidden border-t border-x border-border-strong/70 border-dashed">
        <x-ui.button size="sm" intent="neutral">
            <span aria-hidden="true" class="iconify ph--plus mr-2 size-3.5"></span>
            Create User
        </x-ui.button>
        <x-ui.button size="sm" variant="outline" icon-only>
            <span aria-hidden="true" class="iconify ph--funnel"></span>
        </x-ui.button>
    </div>
    <div
        class="z-11 relative flex items-center justify-end gap-2 h-20 px-5 bg-bg w-full sm:ml-auto sm:w-max max-sm:hidden border-t border-x border-border-strong/70 border-dashed">
        <div
            class="grid grid-cols-3 bg-bg border border-border ui-card [--card-radius:var(--radius-ui)] [--card-padding:0.125rem] text-sm text-fg *:first:inner-radius *:first:rounded-r-none *:last:rounded-l-none *:last:inner-radius overflow-hidden">
            <div class="flex overflow-hidden">
                <input type="radio" name="check-option" id="option1" class="appearance-none peer">
                <label for="option1"
                    class="px-3.5 h-7 truncate peer-checked:bg-fg-title peer-checked:text-bg  w-full flex items-center justify-center">
                    Option 1
                </label>
            </div>
            <div class="flex overflow-hidden">
                <input type="radio" checked="" name="check-option" id="option2" class="appearance-none peer">
                <label for="option2"
                    class="px-3.5 h-7 truncate peer-checked:bg-fg-title peer-checked:text-bg  w-full flex items-center justify-center">
                    Option 2
                </label>
            </div>
            <div class="flex overflow-hidden">
                <input type="radio" name="check-option" id="option3" class="appearance-none peer">
                <label for="option3"
                    class="px-3.5 h-7 truncate peer-checked:bg-fg-title peer-checked:text-bg  w-full flex items-center justify-center">
                    Option 3
                </label>
            </div>
        </div>
    </div>

    <div
        class="flex divide-x divide-border-strong divide-dashed items-center gap-2 bg-bg ml-auto w-max max-sm:border-b-0 border border-border-strong/70 border-dashed relative z-11">
        <div class="flex items-center gap-4 h-12 sm:h-20 px-5">
            <x-ui.checkbox checked />
            <x-ui.checkbox disabled />
            <x-ui.radio checked />
        </div>
        <div class="px-5 flex-1 flex items-center md:w-xs h-12 sm:h-20">
            <x-ui.range name="range_slide" min="0" max="100" class="text-fg-title"
                custom-indicator="bg-fg-title" />
        </div>
    </div>
    <div class="w-full max-lg:overflow-hidden px-px pb-px border-t border-border-strong border-dashed sm:border-t-0">
        <div
            class="min-w-[530px] gap-5 sm:gap-6 min-[460px]:min-w-[740px] sm:min-w-[890px] md:min-w-[1000px]  w-full grid grid-cols-[300px_1fr] md:grid-cols-[360px_1fr] xl:grid-cols-[300px_1fr_280px]">
            <div class="grid gap-4">
                <div class="relative z-11 pt-3 md:h-12 flex items-end gap-2 bg-linear-to-t from-bg from-80%">
                    <x-ui.switch size="sm" checked name="switch_1" id="switch_1"
                        class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
                    <x-ui.switch size="sm" name="switch_2" id="switch_2"
                        class="bg-bg-muted text-fg-title [--knob-bg:var(--color-bg)]" />
                </div>

                <x-ui.card class="shadow-sm [--ui-padding:1.125rem]">
                    <div class="flex items-center gap-4">
                        <div class="size-10">
                            <x-ui.avatar size="lg" src="/defaultavatar.webp" alt="User default" loading="lazy"
                                decoding="async" fetchpriority="auto" width="150" height="150" />
                        </div>
                        <div class="space-y-0.5 flex flex-col">
                            <span class="font-semibold text-sm text-fg-title">Tresor Kasenda</span>
                            <p class="text-sm text-fg-muted">tresorkasenda@unoui.app</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 text-sm text-fg-muted mt-2">
                        <span class="flex iconify ph--buildings"></span>
                        <span>Unoforge</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2 mt-4">
                        <x-ui.button href="#" size="sm" class="justify-center truncate">
                            Manage profile
                        </x-ui.button>
                        <x-ui.button href="#" size="sm" variant="outline" class="justify-center truncate">
                            View Details
                        </x-ui.button>
                    </div>
                </x-ui.card>

                <x-ui.card fill="none" class="h-max bg-bg-surface [--ui-padding:0.125rem]">
                    <div class="bg-bg inner-radius p-3.5 flex flex-col">
                        <span class="font-semibold text-fg-title">
                            Plan ui components V1
                        </span>
                        <div class=""></div>
                        <p class="my-1.5 text-fg-muted text-sm line-clamp-1">
                            Plan the components for the next version of the UI
                        </p>
                        <div class="flex flex-col pt1">
                            <x-ui.progress max="10" value="3" class="text-fg-title" />
                            <div class="pt-0.5 flex w-full text-xs justify-between text-fg-muted">
                                <span>On going</span>
                                <div class="font-medium text-fg">3/10</div>
                            </div>
                        </div>
                        <div class="flex justify-between mt-1.5">
                            <div class="flex -space-x-2">
                                <x-ui.avatar src="/avatar1.webp" alt="Avatar 1" loading="lazy" size="xs"
                                    fetchpriority="auto" width="100" height="100" class="border border-bg-muted" />
                                <x-ui.avatar src="/avatar2.webp" alt="Avatar 1" loading="lazy" size="xs"
                                    fetchpriority="auto" width="100" height="100"
                                    class="border border-bg-muted" />
                                <x-ui.avatar src="/avatar2.webp" alt="Avatar 1" loading="lazy" size="xs"
                                    fetchpriority="auto" width="100" height="100"
                                    class="border border-bg-muted" />
                            </div>
                            <div class="flex gap-2 items-center text-sm text-fg-muted">
                                <span class="flex items-center text-xs">
                                    <span class="iconify ph--file-plus text-sm mr-0.5"></span> 4
                                </span>
                                <span class="flex items-center text-xs">
                                    <span class="iconify ph--chat-centered-text text-sm mr-0.5"></span> 4
                                </span>
                            </div>
                        </div>
                    </div>
                </x-ui.card>
            </div>
            <div
                class="grid grid-rows-[auto_1fr_auto] border border-border-strong/40 dark:border-border bg-bg dark:bg-bg-surface/40 rounded-ui">
                <div class="relative z-11 p-4 flex items-center justify-between">
                    <div class="flex">
                        <x-ui.input.group size="sm">
                            <x-ui.input variant="unstyled" placeholder="Start typing" class="ps-7 px-3" />
                            <x-ui.input.leading absolute class="text-fg text-sm [--left-space:8px]">
                                <span class="flex iconify ph--magnifying-glass size-3.5"></span>
                            </x-ui.input.leading>
                        </x-ui.input.group>
                    </div>
                    <div class="flex items-center gap-2">
                        <x-ui.button variant="outline" size="sm">
                            <span aria-hidden="true" class="iconify ph--export size-3.5 mr-1.5"></span>
                            Export
                        </x-ui.button>
                        <x-ui.button intent="neutral" size="sm">
                            <span aria-hidden="true" class="iconify ph--plus size-3.5 mr-1.5"></span>
                            Invite
                        </x-ui.button>
                    </div>
                </div>
                <x-ui.table no-divider wrapper="flex-1">
                    <x-ui.table.columns wrapper="bg-bg-muted/50">
                        <x-ui.table.column class="pl-2.5 [--gutter-x:3px] w-8">
                            <x-ui.checkbox id="check_all" />
                        </x-ui.table.column>
                        <x-ui.table.column class="pl-2">
                            Member
                        </x-ui.table.column>
                        <x-ui.table.column>
                            Tokens used
                        </x-ui.table.column>
                        <x-ui.table.column class="w-30">
                            Role
                        </x-ui.table.column>
                    </x-ui.table.columns>
                    <x-ui.table.rows class="">
                        @php
                            $users_demo = [
                                [
                                    'id' => '01',
                                    'info' => [
                                        'full_name' => 'Johnkat MJ',
                                        'email' => 'johnkatmj@gmail.com',
                                        'avatar' => 'https://avatars.githubusercontent.com/u/59884686?v=4',
                                        'initial' => 'JK',
                                    ],
                                    'tokens' => [
                                        'used' => 4500,
                                        'total' => 6500,
                                    ],
                                    'profile' => 'public',
                                    'role' => 'admin',
                                ],
                                [
                                    'id' => '02',
                                    'info' => [
                                        'full_name' => 'Tresor Kasenda',
                                        'email' => 'tres@doe.john',
                                        'avatar' => 'https://avatars.githubusercontent.com/u/34010260?v=4',
                                        'initial' => 'TS',
                                    ],
                                    'tokens' => [
                                        'used' => 1200,
                                        'total' => 5000,
                                    ],
                                    'profile' => 'public',
                                    'role' => 'Moderator',
                                ],
                                [
                                    'id' => '03',
                                    'info' => [
                                        'full_name' => 'Tresor Kasenda',
                                        'email' => 'tres@doe.john',
                                        'avatar' => '',
                                        'initial' => 'TS',
                                    ],
                                    'tokens' => [
                                        'used' => 1200,
                                        'total' => 5000,
                                    ],
                                    'profile' => 'public',
                                    'role' => 'Moderator',
                                ],
                                [
                                    'id' => '04',
                                    'info' => [
                                        'full_name' => 'Tresor Kasenda',
                                        'email' => 'tres@doe.john',
                                        'avatar' => '',
                                        'initial' => 'TS',
                                    ],
                                    'tokens' => [
                                        'used' => 1200,
                                        'total' => 5000,
                                    ],
                                    'profile' => 'public',
                                    'role' => 'Moderator',
                                ],
                                [
                                    'id' => '05',
                                    'info' => [
                                        'full_name' => 'Tresor Kasenda',
                                        'email' => 'tres@doe.john',
                                        'avatar' => '',
                                        'initial' => 'TS',
                                    ],
                                    'tokens' => [
                                        'used' => 1200,
                                        'total' => 5000,
                                    ],
                                    'profile' => 'public',
                                    'role' => 'Moderator',
                                ],
                            ];
                        @endphp
                        @foreach ($users_demo as $user)
                            <x-ui.table.row>
                                <x-ui.table.cell class="pl-2.5 [--gutter-x:3px]">
                                    <x-ui.checkbox id="check_{{ $user['id'] }}" />
                                </x-ui.table.cell>
                                <x-ui.table.cell class="pl-2">
                                    <div class="flex items-center gap-2">
                                        @if ($user['info']['avatar'] !== '')
                                            <x-ui.avatar  radius="none" class="rounded-ui bg-bg-muted/60" size="sm" :src="$user['info']['avatar']" />
                                        @else
                                            <x-ui.avatar-placeholder radius-none class="rounded-ui" size="sm"  :text="$user['info']['initial']" />
                                        @endif
                                        <div>
                                            <div class="font-medium text-fg-title text-sm">
                                                {{ $user['info']['full_name'] }}</div>
                                            <div class="text-xs text-fg-muted">{{ $user['info']['email'] }}</div>
                                        </div>
                                    </div>
                                </x-ui.table.cell>
                                <x-ui.table.cell>
                                    @php
                                        $token_percentage = round(($user['tokens']['used'] / $user['tokens']['total']) * 100, 1);

                                        if ($token_percentage < 30) {
                                            $status_color = 'text-success';
                                        } elseif ($token_percentage >= 80) {
                                            $status_color = 'text-danger';
                                        } else {
                                            $status_color = 'text-warning';
                                        }
                                    @endphp
                                    <div class="flex items-center gap-2 ">
                                        <x-ui.progress :max="$user['tokens']['total']" :value="$user['tokens']['used']" class="{{ $status_color }}"
                                            size="sm" />
                                        <span class="text-xs text-fg-muted">
                                            {{ $token_percentage }}%</span>
                                    </div>
                                </x-ui.table.cell>
                                <x-ui.table.cell>
                                    @php
                                        $badge_intent =
                                            $user['role'] === 'admin'
                                                ? [
                                                    'variant' => 'solid',
                                                    'intent' => 'neutral',
                                                ]
                                                : [
                                                    'variant' => 'subtle',
                                                    'intent' => 'gray',
                                                ];
                                    @endphp
                                    <x-ui.badge size="sm" :variant="$badge_intent['variant']" :intent="$badge_intent['intent']">
                                        {{ $user['role'] }}
                                    </x-ui.badge>
                                </x-ui.table.cell>
                            </x-ui.table.row>
                        @endforeach
                    </x-ui.table.rows>
                </x-ui.table>
            </div>
            <div class="hidden lg:flex flex-col gap-4 pt-0.5 relative">
                <x-ui.card class="-mt-4 relative z-12 shadow-sm flex items-start gap-4">
                    <div class="flex min-wmax ui-subtle ui-subtle-gray p-2.5 inner-radius">
                        <span class="iconify ph--github-logo"></span>
                    </div>
                    <div class="flex-1 flex flex-col">
                        <span class="text-fg-title font-semibold">Github</span>
                        <p class="mt=2 text-sm text-fg-muted">
                            Link pull requests, commits and automate workflows
                        </p>
                        <x-ui.button size="sm" variant="outline" class="mt-3 w-max">
                            Enable
                        </x-ui.button>
                    </div>
                </x-ui.card>
                <div class="bg-bg rounded-ui ring ring-border-card w-full px-3.5 py-6 flex flex-col items-center text-center">
                    <div class="size-10 rounded-full ui-subtle ui-subtle-gray flex items-center justify-center">
                        <span class="iconify ph--calendar-plus text-xl"></span> 
                    </div>
                    <p class="mt-2 text-fg-muted text-sm">No Schedules</p> 
                    <x-ui.button size="sm" variant="outline"
                        class="btn mt-3">
                        Create new schedule
                    </x-ui.button>
                </div>

            </div>
        </div>
    </div>
</div>

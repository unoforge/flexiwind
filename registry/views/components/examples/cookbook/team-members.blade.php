{{--
    Une équipe : inviter avec un rôle (listbox), changer le rôle de chacun
    (dropdown, coche sur le rôle actuel), relancer ou annuler une invitation,
    retirer quelqu'un. Le propriétaire n'a pas de menu : son rôle ne se change
    pas. « Invite » reste éteint tant que l'adresse n'est pas valide.
--}}
@php
    $roles = [
        'admin' => ['Admin', 'Billing, members and settings', 'ph--shield-star'],
        'member' => ['Member', 'Invoices and clients', 'ph--user'],
        'viewer' => ['Viewer', 'Read only', 'ph--eye'],
    ];
    $team = [['Amani Kasongo', 'amani@acme.test', 'Owner'], ['Lea Fontaine', 'lea@acme.test', 'Admin'], ['Tom Becker', 'tom@acme.test', 'Member']];
    $pending = [['sofia@acme.test', 'Member', 'Sent 2 days ago']];
@endphp

<x-ui.card class="flex w-full max-w-md flex-col gap-5 [--ui-padding:--spacing(5)]"
    x-data="{ email: '', get valid() { return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(this.email) } }">
    <div class="flex items-start justify-between gap-3">
        <span class="flex min-w-0 flex-col gap-1">
            <span class="text-[15px] font-semibold text-title-foreground">Team members</span>
            <span class="text-sm text-muted-foreground">Invite people to collaborate on this workspace.</span>
        </span>
        <x-ui.badge size="sm" variant="soft" intent="gray" class="shrink-0 tabular-nums">{{ count($team) }} of 5 seats</x-ui.badge>
    </div>

    <form class="flex gap-2" x-on:submit.prevent="email = ''">
        <div class="min-w-0 flex-1"><x-ui.input id="fx-invite" type="email" size="sm" placeholder="name@acme.test" aria-label="Email to invite" x-model="email" /></div>
        <div class="w-28 shrink-0"><x-ui.listbox name="fx-invite-role" value="member" size="sm" aria-label="Role" placement="bottom-end">
            @foreach ($roles as $key => [$label, $text])
                <x-ui.listbox.item :value="$key" :label="$label">
                    <x-ui.listbox.label>{{ $label }}</x-ui.listbox.label>
                    <x-ui.listbox.description>{{ $text }}</x-ui.listbox.description>
                </x-ui.listbox.item>
            @endforeach
        </x-ui.listbox></div>
        <x-ui.button type="submit" size="sm" class="gap-1.5" x-bind:disabled="! valid"><x-ui.icon name="ph--paper-plane-tilt" size="xs" />Invite</x-ui.button>
    </form>

    <div class="flex flex-col gap-3">
        <span class="font-mono text-[11px] tracking-[.06em] text-muted-foreground uppercase">Members · {{ count($team) }}</span>
        <ul class="flex flex-col gap-3">
            @foreach ($team as [$name, $email, $role])
                <li x-data="{ role: '{{ strtolower($role) }}' }" class="flex items-center gap-3">
                    <span class="relative">
                        <x-ui.avatar-placeholder size="sm" variant="soft" :intent="$loop->first ? 'primary' : 'gray'" :text="collect(explode(' ', $name))->map(fn ($part) => $part[0])->implode('')" />
                        @if (! $loop->last)
                            <span class="absolute -right-0.5 -bottom-0.5 size-2.5 rounded-full bg-success ring-2 ring-card"></span>
                        @endif
                    </span>
                    <span class="flex min-w-0 flex-1 flex-col">
                        <span class="truncate text-sm font-medium text-title-foreground">{{ $name }}</span>
                        <span class="truncate text-xs text-muted-foreground">{{ $email }}</span>
                    </span>
                    @if ($role === 'Owner')
                        <x-ui.badge size="sm" variant="soft" intent="primary">Owner</x-ui.badge>
                    @else
                        <x-ui.dropdown.trigger :dropdownId="'fx-role-'.$loop->index" variant="outline" intent="gray" size="xs" class="gap-1 text-title-foreground" aria-label="Change role of {{ $name }}">
                            <span x-text="{{ Js::from(array_map(fn ($item) => $item[0], $roles)) }}[role]">{{ $role }}</span>
                            <x-ui.icon name="ph--caret-down" size="xs" class="text-muted-foreground in-aria-expanded:rotate-180" />
                        </x-ui.dropdown.trigger>
                        <x-ui.dropdown :id="'fx-role-'.$loop->index" placement="bottom-end" class="w-64">
                            @foreach ($roles as $key => [$label, $text, $icon])
                                <x-ui.dropdown.item x-on:click="role = '{{ $key }}'" x-bind:aria-selected="String(role === '{{ $key }}')">
                                    <x-ui.dropdown.icon><x-ui.icon :name="$icon" /></x-ui.dropdown.icon>
                                    <x-ui.dropdown.label>{{ $label }}</x-ui.dropdown.label>
                                    <x-ui.dropdown.description>{{ $text }}</x-ui.dropdown.description>
                                </x-ui.dropdown.item>
                            @endforeach
                            <x-ui.dropdown.separator />
                            <x-ui.dropdown.item intent="destructive">
                                <x-ui.dropdown.icon class="text-current"><x-ui.icon name="ph--user-minus" /></x-ui.dropdown.icon>
                                <x-ui.dropdown.label>Remove from team</x-ui.dropdown.label>
                            </x-ui.dropdown.item>
                        </x-ui.dropdown>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flex flex-col gap-3 border-t border-border pt-4">
        <span class="font-mono text-[11px] tracking-[.06em] text-muted-foreground uppercase">Pending · {{ count($pending) }}</span>
        @foreach ($pending as [$address, $role, $sent])
            <div x-data="{ open: true }" x-show="open" class="flex items-center gap-3">
                <span class="flex size-8 shrink-0 items-center justify-center rounded-full border border-dashed border-border-strong text-muted-foreground"><x-ui.icon name="ph--envelope-simple" size="xs" /></span>
                <span class="flex min-w-0 flex-1 flex-col">
                    <span class="truncate text-sm text-title-foreground">{{ $address }}</span>
                    <span class="truncate text-xs text-muted-foreground">{{ $role }} · {{ $sent }}</span>
                </span>
                <x-ui.button size="xs" variant="ghost" intent="gray">Resend</x-ui.button>
                <x-ui.button size="xs" variant="ghost" intent="destructive" x-on:click="open = false">Revoke</x-ui.button>
            </div>
        @endforeach
    </div>
</x-ui.card>

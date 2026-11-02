{{--
    Relancer un client : le ton choisi réécrit le message, l'envoi confirme
    et ne peut plus être répété. Annuler reste discret, Send est l'action
    principale.
--}}
@php
    $tones = [
        'friendly' => ['Friendly', 'Hi Marc, hope the week is going well! A gentle nudge that LDG-0418 ($6,400) was due on Oct 2. You can pay it from the link below.'],
        'firm' => ['Firm', 'Hi Marc, invoice LDG-0418 ($6,400) is now 14 days overdue. Could you confirm a payment date by Friday?'],
        'final' => ['Final', 'Marc, LDG-0418 ($6,400) remains unpaid after two reminders. Please settle it within 7 days to avoid late fees.'],
    ];
@endphp

<x-ui.card class="flex w-full max-w-md flex-col gap-4 [--ui-padding:--spacing(5)]"
    x-data="{ tone: 'friendly', sent: false, tones: {{ Js::from($tones) }} }">
    <div class="flex items-start justify-between gap-3">
        <span class="flex min-w-0 flex-col gap-1">
            <span class="text-[15px] font-semibold text-title-foreground">Send a reminder</span>
            <span class="text-sm text-muted-foreground">LDG-0418 · Northwind Traders</span>
        </span>
        <x-ui.badge size="sm" variant="soft" intent="danger" class="shrink-0">14 days overdue</x-ui.badge>
    </div>
    <div role="radiogroup" aria-label="Tone" class="grid grid-cols-3 gap-0.5 rounded-ui bg-muted p-0.5">
        @foreach ($tones as $key => [$label])
            <button type="button" role="radio" x-on:click="tone = '{{ $key }}'; sent = false" x-bind:aria-checked="String(tone === '{{ $key }}')"
                class="h-7 cursor-pointer rounded-[calc(var(--radius-ui)-2px)] text-xs font-medium text-muted-foreground transition-colors hover:text-title-foreground aria-checked:bg-background aria-checked:text-title-foreground aria-checked:shadow-xs">{{ $label }}</button>
        @endforeach
    </div>
    <div class="flex flex-col gap-2.5 rounded-ui border border-border p-3.5">
        <span class="flex items-center gap-2 text-xs text-muted-foreground">To <span class="rounded-full bg-muted px-2 py-0.5 text-title-foreground">marc@northwind.test</span></span>
        <p class="min-h-16 text-sm/6 text-foreground" x-text="tones[tone][1]">{{ $tones['friendly'][1] }}</p>
        <span class="flex items-center gap-1.5 border-t border-border pt-2.5 text-xs text-muted-foreground"><x-ui.icon name="ph--paperclip" size="xs" />LDG-0418.pdf · 84 KB</span>
    </div>
    <div class="flex items-center justify-between gap-2">
        <x-ui.checkbox id="fx-attach" label="Attach PDF" checked />
        <div class="flex items-center gap-2">
            <x-ui.button type="button" size="sm" variant="ghost" intent="gray" x-bind:disabled="sent">Cancel</x-ui.button>
            <x-ui.button size="sm" class="gap-1.5" x-bind:disabled="sent" x-on:click="sent = true">
                <x-ui.icon name="ph--paper-plane-tilt" size="xs" x-show="! sent" />
                <x-ui.icon name="ph--check" size="xs" x-show="sent" x-cloak />
                <span x-text="sent ? 'Sent' : 'Send reminder'">Send reminder</span>
            </x-ui.button>
        </div>
    </div>
    <p x-show="sent" x-cloak x-transition.opacity role="status" class="flex items-center gap-1.5 text-xs text-success"><x-ui.icon name="ph--check-circle" size="xs" />Reminder sent to marc@northwind.test</p>
</x-ui.card>

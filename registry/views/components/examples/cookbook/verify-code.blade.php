{{--
    Un code à six chiffres : le curseur avance seul, coller remplit tout, et
    « Verify » ne s'allume qu'une fois le code complet. Le renvoi se débloque
    après un délai. Branchez otp-change et le bouton sur votre vérification.
--}}
<x-ui.card class="flex w-full max-w-sm flex-col items-center gap-5 text-center [--ui-padding:--spacing(6)]"
    x-data="{ code: '', verified: false, wait: 30, timer: null,
        init() { this.tick() },
        tick() { clearInterval(this.timer); this.wait = 30; this.timer = setInterval(() => { if (--this.wait <= 0) clearInterval(this.timer) }, 1000) } }"
    x-on:otp-change="code = $event.detail; verified = false">
    <span class="flex size-11 items-center justify-center rounded-full bg-primary/12 text-primary"><x-ui.icon name="ph--shield-check" size="md" /></span>
    <span class="flex flex-col gap-1">
        <span class="text-[15px] font-semibold text-title-foreground">Verify your account</span>
        <span class="text-sm text-muted-foreground">Enter the 6-digit code we sent to <span class="font-medium text-title-foreground">j****@acme.test</span></span>
    </span>
    <div class="flex flex-col items-center gap-3">
        <x-ui.otp validation="number" class="gap-1.5">
            @foreach (range(1, 6) as $digit)
                <x-ui.otp.input size="none" inputmode="numeric" autocomplete="{{ $digit === 1 ? 'one-time-code' : 'off' }}" aria-label="Digit {{ $digit }}"
                    x-bind:class="verified && 'border-success! ring-3 ring-success/15'" class="size-10 max-w-10 px-0 text-lg font-semibold text-title-foreground" />
            @endforeach
        </x-ui.otp>
        <span x-show="verified" x-cloak x-transition.opacity role="status" class="flex items-center gap-1.5 text-sm font-medium text-success"><x-ui.icon name="ph--check-circle" />Account verified</span>
    </div>
    <x-ui.button class="w-full justify-center" x-bind:disabled="code.length !== 6 || verified" x-on:click="verified = true">
        <span x-text="verified ? 'Verified' : 'Verify'">Verify</span>
    </x-ui.button>
    <div class="flex flex-col items-center gap-1 text-sm text-muted-foreground">
        <span x-show="wait > 0">Resend code in <span class="font-mono text-title-foreground tabular-nums" x-text="wait + 's'">30s</span></span>
        <span x-show="wait <= 0" x-cloak>Didn't get it? <button type="button" class="cursor-pointer font-semibold text-primary hover:underline" x-on:click="tick()">Resend code</button></span>
        <x-ui.link href="#" class="text-xs">Use another method</x-ui.link>
    </div>
</x-ui.card>

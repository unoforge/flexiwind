<div class="flex min-h-screen justify-center items-center px-4 sm:px-10 py-5 bg-background ">
    <div class="w-full max-w-md">
        <div class="flex flex-col items-center text-center mb-8">
            <div class="size-14 bg-warning/10 text-warning rounded-full d-flex-place-center mb-4">
                <x-ui.icon name="ph--lock-key" class="size-6" />
            </div>
            <h1 class="text-2xl font-bold text-foreground">Forgot your password?</h1>
            <p class="text-muted-foreground text-sm mt-2 max-w-sm">
                Enter the email address associated with your account and we'll send you a reset link.
            </p>
        </div>
        <x-ui.card size="none" class="rounded-ui p-6 sm:p-8">
            <form class="space-y-5">
                <x-ui.input type="email" label="Email address" placeholder="you@company.com" />
                <x-ui.button type="submit" class="w-full justify-center">
                    <x-ui.icon name="ph--paper-plane-right" class="size-4 mr-2" />
                    Send reset link
                </x-ui.button>
            </form>
            <div class="mt-6 text-center">
                <x-ui.link href="#" class="text-sm text-primary inline-flex items-center gap-1.5">
                    <x-ui.icon name="ph--arrow-left" class="size-3.5" />
                    Back to sign in
                </x-ui.link>
            </div>
        </x-ui.card>
        <p class="text-center text-xs text-muted-foreground mt-6">
            We'll never share your email. By continuing, you agree to our
            <x-ui.link href="#" underlined class="text-primary">Terms of Service</x-ui.link>
            and <x-ui.link href="#" underlined class="text-primary">Privacy Policy</x-ui.link>.
        </p>
    </div>
</div>
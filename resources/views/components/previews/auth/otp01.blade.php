<main class="flex min-h-screen justify-center items-center px-5 sm:px-10 lg:px-0">
    <div class="flex flex-col gap-6 w-full max-w-sm">
        <div class="flex flex-col items-center gap-2 text-center">
            <div class="size-12 bg-primary text-white text-xl rounded-xl flex items-center justify-center mx-auto mb-4">
                <span class="iconify ph--speedometer"></span>
            </div>
            <h1 class="text-xl font-semibold text-fg-title text-balance">
                We sent a 6-digit code to your email address
            </h1>
        </div>
        <form class="flex flex-col gap-4">
            <x-ui.otp class="w-full">
                <div class="flex items-center gap-2 flex-1">
                    <x-ui.otp.input size="none" class="size-10 flex-1" />
                    <x-ui.otp.input size="none" class="size-10 flex-1" />
                    <x-ui.otp.input size="none" class="size-10 flex-1" />
                </div>
                <span class="flex min-w-max px-3 text-2xl font-semibold text-fg-muted">
                    -
                </span>
                <div class="flex items-center gap-2 flex-1">
                    <x-ui.otp.input size="none" class="size-10 flex-1" />
                    <x-ui.otp.input size="none" class="size-10 flex-1" />
                    <x-ui.otp.input size="none" class="size-10 flex-1" />
                </div>
            </x-ui.otp>

            <p class="text-sm text-fg-muted text-center">
                Didn't receive the code?
                <x-ui.link href="#" underlined class="text-primary">
                    Resend
                </x-ui.link>
            </p>
            <x-ui.button class="w-full justify-center">
                Verify
            </x-ui.button>
        </form>
        <p class="px-6 text-center text-fg-muted mx-auto max-w-md text-sm mt-3">
            By clicking continue, you agree to our
            <x-ui.link href="#" underlined class="text-primary">Terms of Service</x-ui.link>
            and <x-ui.link href="#" underlined class="text-primary">Privacy Policy</x-ui.link>.
        </p>
    </div>
</main>

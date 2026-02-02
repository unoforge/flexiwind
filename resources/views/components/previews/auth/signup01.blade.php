<main class="flex min-h-screen justify-center items-center px-4 sm:px-10 lg:px-0">
    <x-ui.card class="rounded-ui p-6 sm:p-8 flex flex-col w-full max-w-lg">
        <div class="size-12 bg-primary text-white text-xl rounded-xl flex items-center justify-center mx-auto mb-4">
            <span class="iconify ph--speedometer"></span>
        </div>
        <div class="text-center">
            <h1 class="text-fg-title mb-1 text-xl font-semibold">Create your account</h1>
            <p class="text-sm text-fg-muted">
                Fill in your details to get started
            </p>ring-1 ring-border-strong/60
        </div>
        <x-ui.divider class="my-8 border-border-strong/60" />
        <form class="flex flex-col gap-4">
            <div class="grid grid-cols-2 gap-4">
                <x-ui.input type="text" placeholder="John" label="First Name" />
                <x-ui.input type="text" placeholder="Doe" label="Last Name" />
            </div>
            <x-ui.input type="email" placeholder="johndoe@example.com" label="Email" />
            <x-ui.input type="password" placeholder="••••••••" label="Create Password" />
            <x-ui.input type="password" placeholder="••••••••" label="Confirm Password" />
            <div class="text-xs text-fg-muted -mt-2">
                Use 8 or more characters with a mix of letters, numbers & symbols
            </div>
            <x-ui.button class="justify-center w-full mt-2">
                Create Account
            </x-ui.button>
        </form>

        <div class="text-center mt-6">
            <p class="text-sm text-fg-muted">
                Already have an account?
                <x-ui.link href="#" class="font-medium text-primary ml-1">Login</x-ui.link>
            </p>
        </div>
    </x-ui.card>
</main>

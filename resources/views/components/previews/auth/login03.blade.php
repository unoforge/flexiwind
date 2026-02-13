    <main class="flex min-h-screen justify-center items-center px-5 sm:px-10 lg:px-0 py-5">
        <div class="flex flex-col gap-6 w-full max-w-sm">
            <div class="flex flex-col items-center gap-2 text-center">
                <div
                    class="size-12 bg-primary text-white text-xl rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="iconify ph--speedometer"></span>
                </div>
                <h1 class="text-xl font-bold">
                    Welcome to Acme Inc.
                </h1>
                <p class="text-sm text-fg-muted">
                    Don't have an account?
                    <x-ui.link href="#" underlined class="text-primary">
                        Sign up
                    </x-ui.link>
                </p>
            </div>
            <form class="flex flex-col gap-4">
                <x-ui.input type="email" label="Email" placeholder="johnkatmj@gmail.com" />
                <x-ui.button class="w-full justify-center">
                    Login
                </x-ui.button>
                <x-ui.divider label="Or continue" class="before:bg-bg-muted" label-placement="middle"
                    label-class="px-3 bg-bg text-fg-muted text-sm relative" />
                <div class="grid gap-4 sm:grid-cols-2">
                    <x-ui.button variant="outline" intent="gray" class="justify-center gap-1.5">
                        <span aria-hidden="true" class="iconify ph--apple-logo"></span>
                        <span class="hidden sm:flex text-sm">With Apple</span>
                    </x-ui.button>
                    <x-ui.button variant="outline" intent="gray" class="justify-center gap-1.5">
                        <span aria-hidden="true" class="iconify ph--google-logo"></span>
                        <span class="hidden sm:flex text-sm">With Google</span>
                    </x-ui.button>
                </div>
            </form>
            <p class="px-6 text-center text-fg-muted mx-auto max-w-md text-sm mt-3">
                By clicking continue, you agree to our 
                <x-ui.link href="#" underlined class="text-primary">Terms of Service</x-ui.link>
                and <x-ui.link href="#" underlined class="text-primary">Privacy Policy</x-ui.link>.
            </p>
        </div>
    </main>

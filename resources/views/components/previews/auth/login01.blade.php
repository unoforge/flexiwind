<main class="flex min-h-screen justify-center items-center px-4 sm:px-10 lg:px-0">
    <x-ui.card size="none" class="rounded-ui p-6 sm:p-8 flex flex-col w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="size-12 bg-primary text-white text-xl rounded-ui flex items-center justify-center mx-auto mb-4">
                <span class="iconify ph--speedometer"></span>
            </div>
            <h2 class="text-2xl font-semibold text-fg-title">Welcome back</h2>
            <p class="text-fg-muted mt-1">Sign in to your account</p>
        </div>


        <form class="space-y-4" id="login-form">
            <x-ui.input type="email" id="email" label="Email" placeholder="you@company.com" />
            <div class="space-y-2">
                <x-ui.label for="login-password" class="block">Password</x-ui.label>
                <x-ui.input.group>
                    <x-ui.input id="login-password" un-styled type="email" placeholder="Your email here" class="pe-11 px-3" />
                    <x-ui.input.trailing absolute class="text-fg" clickable>
                        <button type="button" class="flex items-center cursor-pointer">
                            <span class="iconify ph--eye text-fg-muted/80"></span>
                        </button>
                    </x-ui.input.trailing>
                </x-ui.input.group>
            </div>

            <div class="flex items-center justify-between">
                <x-ui.checkbox id="remember_me" label="Remember me" />
                <x-ui.link href="#" class="text-sm text-primary">Forgot password?</x-ui.link>
            </div>

            <x-ui.button type="submit" class="w-full justify-center">
                Sign in
            </x-ui.button>
        </form>

        <x-ui.divider label-placement="middle" label="Or continue with" class="before:bg-bg-muted my-6"
            label-class="pr-3 bg-bg text-fg relative" />

        <!-- Social Login -->
        <div class="grid grid-cols-2 gap-3">
            <x-ui.button variant="outline" intent="gray" class="justify-center">
                <span class="iconify ph--google-logo mr-2"></span>
                <span>Google</span>
            </x-ui.button>
            <x-ui.button variant="outline" intent="gray" class="justify-center">
                <span class="iconify ph--github-logo mr-2"></span>
                <span>GitHub</span>
            </x-ui.button>
        </div>

        <!-- Sign Up Link -->
        <div class="text-center mt-6">
            <p class="text-sm text-fg-muted">
                Don't have an account?
                <x-ui.link href="#" class="font-medium text-primary ml-1">Sign up</x-ui.link>
            </p>
        </div>
    </x-ui.card>
</main>

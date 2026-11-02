<div class="flex min-h-screen">
    <div class="hidden lg:flex flex-1 bg-linear-to-br from-primary/5 to-accent/5 items-center justify-center p-12">
        <div class="max-w-md text-center">
            <div class="size-20 bg-primary/10 text-primary rounded-2xl d-flex-place-center mx-auto mb-6">
                <x-ui.icon name="ph--lightning" class="size-10" />
            </div>
            <h2 class="text-3xl font-bold text-foreground mb-3">Build something great</h2>
            <p class="text-muted-foreground leading-relaxed">
                Join thousands of teams already using our platform to streamline their workflow, collaborate in real time, and ship faster than ever.
            </p>
            <div class="mt-8 flex items-center justify-center gap-4 text-sm text-muted-foreground">
                <span class="flex items-center gap-1.5">
                    <x-ui.icon name="ph--check-circle" class="text-success size-4" />
                    No credit card
                </span>
                <span class="flex items-center gap-1.5">
                    <x-ui.icon name="ph--check-circle" class="text-success size-4" />
                    14-day free trial
                </span>
                <span class="flex items-center gap-1.5">
                    <x-ui.icon name="ph--check-circle" class="text-success size-4" />
                    Cancel anytime
                </span>
            </div>
        </div>
    </div>
    <div class="w-full lg:w-160 flex items-center justify-center px-5 sm:px-10 py-10">
        <div class="w-full max-w-sm">
            <div class="mb-8">
                <div class="size-10 bg-primary text-white rounded-lg d-flex-place-center mb-4">
                    <x-ui.icon name="ph--stack" class="size-5" />
                </div>
                <h1 class="text-2xl font-bold text-foreground">Sign in to your account</h1>
                <p class="text-muted-foreground mt-1">Enter your credentials to access the dashboard.</p>
            </div>
            <form class="space-y-4">
                <x-ui.input type="email" label="Email" placeholder="name@company.com" />
                <x-ui.input type="password" label="Password" placeholder="••••••••" />
                <div class="flex items-center justify-between">
                    <x-ui.checkbox id="login04-remember" label="Keep me signed in" />
                    <x-ui.link href="#" underlined class="text-sm text-primary">Forgot password?</x-ui.link>
                </div>
                <x-ui.button type="submit" class="w-full justify-center">
                    <x-ui.icon name="ph--arrow-right" class="size-4 mr-2" />
                    Sign in
                </x-ui.button>
            </form>
            <x-ui.divider label-placement="middle" label="Or continue with" class="before:bg-muted my-6"
                label-class="px-3 bg-background  text-muted-foreground text-sm" />
            <div class="grid grid-cols-2 gap-3">
                <x-ui.button variant="outline" intent="gray" class="justify-center">
                    <x-ui.icon name="ph--google-logo" class="mr-2" />
                    Google
                </x-ui.button>
                <x-ui.button variant="outline" intent="gray" class="justify-center">
                    <x-ui.icon name="ph--github-logo" class="mr-2" />
                    GitHub
                </x-ui.button>
            </div>
            <p class="text-center text-sm text-muted-foreground mt-6">
                Don't have an account?
                <x-ui.link href="#" class="text-primary font-medium ml-1">Sign up</x-ui.link>
            </p>
        </div>
    </div>
</div>
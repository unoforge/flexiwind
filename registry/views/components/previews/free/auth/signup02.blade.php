<div class="flex min-h-screen justify-center items-center px-4 sm:px-10 py-10">
    <div class="w-full max-w-lg">
        <div class="text-center mb-8">
            <div class="size-14 bg-primary/10 text-primary rounded-full d-flex-place-center mx-auto mb-4">
                <x-ui.icon name="ph--user-circle-plus" class="size-6" />
            </div>
            <h1 class="text-2xl font-bold text-foreground">Create an account</h1>
            <p class="text-muted-foreground text-sm mt-1">
                Already have one?
                <x-ui.link href="#" class="text-primary font-medium ml-1">Sign in</x-ui.link>
            </p>
        </div>
        <form class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-ui.field label="Full Name" for="signup02-name" class="sm:col-span-2">
                <x-ui.input type="text" id="signup02-name" placeholder="Full name" />
            </x-ui.field>
            <x-ui.field label="Email address" for="signup02-email" class="sm:col-span-2">
                <x-ui.input type="email" id="signup02-email" placeholder="you@company.com" />
            </x-ui.field>
            <x-ui.field label="Password" for="signup02-password">
                <x-ui.input type="password" id="signup02-password" placeholder="••••••••" />
            </x-ui.field>
            <x-ui.field label="Confirm Password" for="signup02-password-confirm">
                <x-ui.input type="password" id="signup02-password-confirm" placeholder="••••••••" />
            </x-ui.field>
            <div class="sm:col-span-2">
                <x-ui.checkbox id="signup02-terms" label="I agree to the Terms of Service and Privacy Policy" />
            </div>
            <x-ui.button type="submit" class="sm:col-span-2 w-full justify-center py-3">
                Create free account
            </x-ui.button>
        </form>
        <x-ui.divider label-placement="middle" label="Or sign up with" class="before:bg-muted my-6"
            label-class="px-3 bg-background  text-muted-foreground text-sm" />
        <div class="grid grid-cols-3 gap-3">
            <x-ui.button variant="outline" intent="gray" class="justify-center gap-2">
                <x-ui.icon name="ph--google-logo" />
                <span class="hidden sm:inline">Google</span>
            </x-ui.button>
            <x-ui.button variant="outline" intent="gray" class="justify-center gap-2">
                <x-ui.icon name="ph--github-logo" />
                <span class="hidden sm:inline">GitHub</span>
            </x-ui.button>
            <x-ui.button variant="outline" intent="gray" class="justify-center gap-2">
                <x-ui.icon name="ph--apple-logo" />
                <span class="hidden sm:inline">Apple</span>
            </x-ui.button>
        </div>
    </div>
</div>
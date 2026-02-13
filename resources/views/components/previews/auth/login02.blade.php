<main class="flex min-h-screen justify-center items-center px-5 sm:px-10 lg:px-0 py-5">
    <x-ui.card size="none" class="rounded-ui p-5 sm:p-8 max-w-md">
        <div class="text-center mb-6">
            <h2 class="text-xl font-semibold text-fg-title">Sign In</h2>
            <p class="text-fg-muted text-sm mt-2">
                Welcome back! Please sign in to your account.
            </p>
        </div>
        <form class="space-y-4">
            <x-ui.input id="email" type="email" placeholder="johndeo@gmail.com" label="Email"  autocomplete="off"/>
             <x-ui.input id="password" type="password" placeholder="********" label="Password"  autocomplete="off"/>
            
            <div class="flex items-center justify-between">
                <x-ui.checkbox id="remember" label="Remember me"/>
                
                <x-ui.link href="#" underlined class="text-sm text-primary">Forgot password?</x-ui.link>
            </div>
            <x-ui.button type="submit"
                class="justify-center w-full">
                Sign In
            </x-ui.button>
        </form>
        <div class="mt-6 text-center">
            <p class="text-sm text-fg-muted">
                Don't have an account?
                <x-ui.link href="#" class="text-primary">Sign up</x-ui.link>
            </p>
        </div>
    </x-ui.card>
</main>

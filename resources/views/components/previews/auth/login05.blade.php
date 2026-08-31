<div class="flex min-h-screen">
    <div class="flex-1 flex items-center justify-center px-5 sm:px-10 py-10 bg-background ">
        <div class="w-full max-w-sm">
            <div class="text-center mb-8">
                <div class="size-14 bg-primary/10 text-primary rounded-full d-flex-place-center mx-auto mb-4">
                    <x-ui.icon name="ph--key" class="size-6" />
                </div>
                <h1 class="text-2xl font-bold text-foreground">Welcome back</h1>
                <p class="text-muted-foreground text-sm mt-1">Sign in to continue to your workspace.</p>
            </div>
            <form class="space-y-4">
                <x-ui.input type="email" placeholder="you@example.com" label="Email" />
                <x-ui.input type="password" placeholder="••••••••" label="Password" />
                <div class="flex items-center justify-between">
                    <x-ui.checkbox id="login05-remember" label="Remember this device" />
                </div>
                <x-ui.button type="submit" class="w-full justify-center text-base py-3">
                    Sign in with SSO
                </x-ui.button>
            </form>
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-border"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-3 bg-background  text-muted-foreground">or</span>
                </div>
            </div>
            <x-ui.button variant="outline" intent="gray" class="w-full justify-center">
                <x-ui.icon name="ph--envelope" class="mr-2" />
                Continue with magic link
            </x-ui.button>
            <x-ui.button variant="ghost" intent="gray" class="w-full justify-center mt-3">
                <x-ui.icon name="ph--lock" class="mr-2" />
                Enterprise SSO
            </x-ui.button>
        </div>
    </div>
    <div class="hidden lg:flex flex-1 bg-linear-to-b from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-950 items-center justify-center p-12">
        <div class="max-w-sm text-center">
            <blockquote class="text-lg font-medium text-foreground leading-relaxed">
                "This platform has transformed how our team collaborates. The simplicity is unmatched."
            </blockquote>
            <div class="mt-6 flex items-center justify-center gap-3">
                <x-ui.avatar src="/avatar2.webp" alt="Testimonial" size="md" radius="full" />
                <div class="text-left">
                    <p class="text-sm font-semibold text-foreground">Sarah Mitchell</p>
                    <p class="text-xs text-muted-foreground">CTO, TechFlow Inc.</p>
                </div>
            </div>
        </div>
    </div>
</div>
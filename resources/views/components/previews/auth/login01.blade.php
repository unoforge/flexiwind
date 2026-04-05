<main class="flex min-h-screen justify-center items-center px-4 sm:px-10 lg:px-0 py-5">
    <x-ui.card size="none" class="rounded-ui p-6 sm:p-8 flex flex-col w-full max-w-md">
        <!-- Logo -->
        <div class="text-center mb-8">
            <div class="size-12 bg-primary text-white rounded-ui d-flex-place-center mx-auto mb-4">
                 <svg aria-hidden="true" width="488" height="488" class="size-7" viewBox="0 0 488 488" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_13_164)">
                        <path
                            d="M71.5342 71L416.602 416.068V416.068C321.314 511.356 166.822 511.356 71.5342 416.068V416.068C-23.7537 320.78 -23.7537 166.288 71.5342 71V71Z"
                            fill="currentColor" class=""></path>
                        <path
                            d="M483.659 249.5C483.659 274.629 436.788 344.5 411.659 344.5C386.53 344.5 392.659 274.629 392.659 249.5C392.659 224.371 413.03 204 438.159 204C463.288 204 483.659 224.371 483.659 249.5Z"
                            fill="currentColor" class=""></path>
                        <circle cx="243.429" cy="243.759" r="110" transform="rotate(48.3973 243.429 243.759)"
                            fill="currentColor" stroke="white" stroke-width="80" class="stroke-primary"></circle>
                        <path
                            d="M309 71C309 96.129 212.629 101 187.5 101C162.371 101 142 80.629 142 55.5C142 30.371 162.371 10 187.5 10C212.629 10 309 45.871 309 71Z"
                            fill="currentColor" class=""></path>
                        <path
                            d="M417 101.5C417 126.629 415.129 215.5 390 215.5C364.871 215.5 326 126.629 326 101.5C326 76.371 346.371 56 371.5 56C396.629 56 417 76.371 417 101.5Z"
                            fill="currentColor" class=""></path>
                    </g>
                    <defs>
                        <clipPath id="clip0_13_164">
                            <rect width="488" height="488" fill="currentColor" class="text-bg"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </div>
            <h2 class="text-2xl font-semibold text-fg-title">Welcome back</h2>
            <p class="text-fg-muted mt-1">Sign in to your account</p>
        </div>


        <form class="space-y-4" id="login-form">
            <x-ui.input type="email" id="email" label="Email" placeholder="you@company.com" />
            <div class="space-y-2">
                <x-ui.label for="login-password" class="block">Password</x-ui.label>
                <x-ui.input.group>
                    <x-ui.input id="login-password" variant="unstyled" type="password" placeholder="***********" class="pe-11 px-3" />
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

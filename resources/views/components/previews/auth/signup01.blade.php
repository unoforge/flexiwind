<main class="flex min-h-screen justify-center items-center px-4 sm:px-10 lg:px-0">
    <x-ui.card class="rounded-ui p-6 sm:p-8 flex flex-col w-full max-w-lg">
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
        <div class="text-center">
            <h1 class="text-fg-title mb-1 text-xl font-semibold">Create your account</h1>
            <p class="text-sm text-fg-muted">
                Fill in your details to get started
            </p>
        </div>
        <x-ui.divider class="my-8 border-border-strong/60" />
        <form class="grid grid-cols-2 gap-4">
            <x-ui.input type="text" placeholder="John" label="First Name" />
            <x-ui.input type="text" placeholder="Doe" label="Last Name" />
            <x-ui.input type="email" placeholder="johndoe@example.com" label="Email"
                group-wrapper-class="col-span-full" />
            <x-ui.input type="password" placeholder="••••••••" label="Create Password"
                group-wrapper-class="col-span-full" />
            <x-ui.input type="password" placeholder="••••••••" label="Confirm Password"
                group-wrapper-class="col-span-full" />
            <div class="text-xs text-fg-muted -mt-2 col-span-full">
                Use 8 or more characters with a mix of letters, numbers & symbols
            </div>
            <x-ui.button class="justify-center w-full mt-2 col-span-full">
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
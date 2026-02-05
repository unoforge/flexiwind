<x-ui.modal.trigger intent="primary" variant="solid" modalId="waitlist-modal" size="md">
    Join waitlist
</x-ui.modal.trigger>
<x-ui.modal modalId="waitlist-modal">
    <x-ui.modal.content no-gutter size="sm" :closable="false" class="animated-modal-content p-0.5"
        data-enter-animation="fadeIn .4s linear" data-exit-animation="fadeOut .1s linear">
        <form class="size-full">
            <x-ui.modal.header padding-none class="relative w-full p-4 flex items-center gap-2">
                <span class="ui-soft ui-soft-gray size-12 d-flex-place-center rounded-ui">
                    <span class="iconify ph--cube text-xl"></span>
                </span>
                <div class="flex flex-col flex-1">
                    <x-ui.modal.title>Waitlist</x-ui.modal.title>
                    <x-ui.modal.description>Join the waitlist to get early access to Flexiwind.</x-ui.modal.description>
                </div>
            </x-ui.modal.header>
            <x-ui.modal.body no-gutter
                class="mb-2 bg-bg-surface border border-border ui-card [--card-radius:var(--global-main-radius)] [--card-padding:--spacing(4)] shadow-sm  flex flex-col space-y-4">
                <x-ui.input type="email" label="Your Email" placeholder="johndoe@gmail.com" />
                <x-ui.input type="text" label="Your Name" placeholder="johnkatmj@gmail.com" />
            </x-ui.modal.body>
            <x-ui.modal.footer
                class="[--gutter:--spacing(2)] flex items-center justify-end text-xs text-fg-muted gap-2">
                <x-ui.button intent="primary" class="justify-center flex-1">
                    Join waitlist
                </x-ui.button>
                <x-ui.modal.close size="md" intent="gray" variant="outline">
                    Close
                </x-ui.modal.close>
            </x-ui.modal.footer>
        </form>
    </x-ui.modal.content>
</x-ui.modal>

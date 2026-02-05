<x-ui.modal.trigger intent="primary" modal-id="demo-modal">
    Show Modal
</x-ui.modal.trigger>
<x-ui.modal modal-id="demo-modal">
    <x-ui.modal.content data-enter-animation="fadeIn .4s linear" data-exit-animation="fadeOut .1s linear"
        class="animated-modal-content [--gutter:--spacing(4)] [--content-padding:--spacing(1)] flex flex-col gap-y-4 ease-linear transition-all">
        <x-ui.modal.header title="Edit profile" class="bg-bg-muted/70"
            description="Make changes to your profile here. Click save when you're done." />
        <x-ui.modal.body>
            <div class="space-y-4">
                <x-ui.input label="Email" type="email" id="user_email" name="user_email"
                    placeholder="johndoe@gmail.com" />
                <x-ui.input label="Username" id="user_name" name="user_name" placeholder="@doedoe" />
            </div>
        </x-ui.modal.body>
        <x-ui.modal.footer class="flex justify-end">
            <x-ui.button intent="neutral" size="sm">
                Save change
            </x-ui.button>
        </x-ui.modal.footer>
    </x-ui.modal.content>
</x-ui.modal>

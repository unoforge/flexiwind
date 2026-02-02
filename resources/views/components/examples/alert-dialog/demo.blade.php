<x-ui.modal.trigger intent="primary" modal-id="modal-message-def">
    Show Modal
</x-ui.modal.trigger>
<x-ui.modal modal-id="modal-message-def" class="justify-center items-center">
    <x-ui.modal.content size="sm" :closable="false" data-enter-animation="fadeIn .4s linear" data-exit-animation="fadeOut .1s linear"
        class="animated-modal-content p-(--gutter) flex flex-col gap-y-4 items-center text-center ease-linear transition-all">
        <div class="w-max h-max p-3 rounded-full ui-soft ui-soft-gray border border-border">
            <span aria-hidden="true" class="flex iconify ph--question text-xl"></span>
        </div>
        <x-ui.modal.title>Confirm your action</x-ui.modal.title>
        <x-ui.modal.description>
            Are you sure you want to proceed with this action?
        </x-ui.modal.description>
        <div class="flex justify-center gap-x-3 pt-4">
            <x-ui.button size="sm">
                Yes, Proceed
            </x-ui.button>
            <x-ui.modal.close variant="outline" intent="gray">
                No, Cancel
            </x-ui.modal.close>
        </div>
    </x-ui.modal.content>
</x-ui.modal>

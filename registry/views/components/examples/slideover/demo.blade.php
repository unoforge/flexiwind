<x-ui.slideover.trigger variant="outline" intent="gray" slide-over-id="demo">
    Edit Setting
</x-ui.slideover.trigger>

<x-ui.slideover id="demo">
    <x-ui.slideover.content>
        <x-ui.slideover.header title="Update User Settings"
            description="Make changes to your account here. Click save when you're done." />
        <x-ui.slideover.body class="border-y border-border">
            <div class="py-6 md:py-8 space-y-4">
                <x-ui.input label="Email" type="email" id="user_email" name="user_email"
                    placeholder="johndoe@gmail.com" />
                <x-ui.input label="Username" id="user_name" name="user_name" placeholder="@doedoe" />
            </div>
        </x-ui.slideover.body>
        <x-ui.slideover.footer>
            <x-ui.button intent="neutral">
                Save changes
            </x-ui.button>
            <x-ui.slideover.close size="md" variant="outline" intent="gray">
                Close
            </x-ui.slideover.close>
        </x-ui.slideover.footer>
    </x-ui.slideover.content>
</x-ui.slideover>

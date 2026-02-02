<x-ui.tabs data-indicator-class-name="ui-tabs-indicator flex bg-bg shadow border border-border-strong/40 rounded absolute top-0 left-0"
    class="w-full max-w-md">
    <x-ui.tabs.list class="flex items-center relative w-full p-0.5 bg-bg-subtle rounded-md">
        <x-ui.tabs.trigger wrapper-class="flex flex-1" id="accountTab" href="#accountTab" aria-controls="accountTab"
            tabindex="0" class="px-4 py-2 rounded flex-1 flex items-center justify-center text-sm text-fg relative fx-active:text-fg-title">
            Account
        </x-ui.tabs.trigger>
        <x-ui.tabs.trigger wrapper-class="flex flex-1" id="passTab" href="#passTab" aria-controls="passTab"
            tabindex="-1" class="px-4 py-2 rounded flex-1 flex items-center justify-center text-sm text-fg relative fx-active:text-fg-title">
            Password
        </x-ui.tabs.trigger>
    </x-ui.tabs.list>
    <x-ui.tabs.panel id="accountTab"
        class="p-6 md:p-10 divide-y divide-border-strong border border-border-strong/60 rounded-md mt-2 bg-bg flex-col"
        aria-labelledby="accountTab">
        <div class="space-y-1.5 pb-6 md:pb-8">
            <h3 class="text-2xl font-semibold leading-none tracking-tight text-fg-title">
                Account</h3>
            <p class="text-sm text-fg">Make changes to your account here.
                Click save
                when you're done.</p>
        </div>
        <div class="py-6 md:py-8 space-y-4">
            <x-ui.input label="Email" type="email" id="user_email" name="user_email" placeholder="johndoe@gmail.com" />
            <x-ui.input label="Username" id="user_name" name="user_name" placeholder="@doedoe" />
        </div>
        <div class="flex items-center pt-6 md:pt-8">
            <x-ui.button intent="neutral">
                Save changes
            </x-ui.button>
        </div>
    </x-ui.tabs.panel>
    <x-ui.tabs.panel id="passTab"
        class="p-6 md:p-10 divide-y divide-border-strong border border-border-strong/60 rounded-md mt-2 bg-bg flex-col"
        aria-labelledby="passTab">
        <div class="space-y-1.5 pb-6 md:pb-8">
            <h3 class="text-2xl font-semibold leading-none tracking-tight text-fg-title">
                Password</h3>
            <p class="text-sm text-fg">Change your password here. After
                saving, you'll be logged out.</p>
        </div>
        <div class="py-6 md:py-8 space-y-4">
            <x-ui.input label="Current password" type="password" id="currentPassword" name="currentPassword" placeholder="johndoe@gmail.com" />
            <x-ui.input label="New password" type="password" id="new_password" name="new_password" placeholder="******" />
        </div>
        <div class="flex items-center pt-6 md:pt-8">
            <x-ui.button intent="neutral">Save changes </x-ui.button>
        </div>
    </x-ui.tabs.panel>
</x-ui.tabs>

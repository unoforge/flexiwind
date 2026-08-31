<form class="space-y-4 max-w-lg w-full">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <x-ui.field label="First Name" for="field-grid-first" required>
            <x-ui.input id="field-grid-first" placeholder="John" />
        </x-ui.field>
        <x-ui.field label="Last Name" for="field-grid-last" required>
            <x-ui.input id="field-grid-last" placeholder="Doe" />
        </x-ui.field>
    </div>
    <x-ui.field label="Email" for="field-grid-email" required>
        <x-ui.input type="email" id="field-grid-email" placeholder="john@company.com" />
    </x-ui.field>
</form>

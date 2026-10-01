<form class="space-y-4 max-w-sm w-full">
    <x-ui.field label="Email" for="field-error-email"
        error="The email field is required.">
        <x-ui.input type="email" id="field-error-email" placeholder="you@example.com" invalid />
    </x-ui.field>

    <x-ui.field label="Password" for="field-error-password"
        error="Password must be at least 8 characters.">
        <x-ui.input type="password" id="field-error-password" placeholder="••••••••" invalid />
    </x-ui.field>
</form>

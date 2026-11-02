<form class="space-y-4 max-w-sm w-full">
    <x-ui.field label="Email" for="field-demo-email" hint="We'll never share your email" required>
        <x-ui.input type="email" id="field-demo-email" placeholder="you@example.com" />
    </x-ui.field>

    <x-ui.field label="Bio" for="field-demo-bio" hint="Tell us about yourself">
        <x-ui.textarea id="field-demo-bio" rows="3" placeholder="I'm a..." />
    </x-ui.field>

    <x-ui.field label="Country" for="field-demo-country" required>
        <x-ui.select id="field-demo-country">
            <option value="">Select...</option>
            <option value="us">United States</option>
            <option value="fr">France</option>
        </x-ui.select>
    </x-ui.field>
</form>

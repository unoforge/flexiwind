<div class="grid w-full max-w-2xl gap-6 sm:grid-cols-2">
    <x-ui.autocomplete name="warehouse" value="gombe" label="Disabled" disabled :options="['gombe' => 'Kinshasa · Gombe', 'limete' => 'Kinshasa · Limete']" />
    <div class="flex flex-col gap-2">
        <x-ui.autocomplete name="airport" label="Invalid" invalid aria-describedby="airport-error" :options="['cdg' => 'Paris (CDG)', 'ory' => 'Paris (ORY)']" />
        <p id="airport-error" class="text-sm text-destructive">Pick an airport from the list.</p>
    </div>
</div>

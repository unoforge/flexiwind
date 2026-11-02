<div class="grid w-full max-w-3xl gap-6 sm:grid-cols-3">
    <x-ui.listbox name="region" value="eu" label="Disabled" disabled :options="['eu' => 'Europe (Paris)', 'us' => 'United States']" />
    <div class="flex flex-col gap-2">
        <x-ui.listbox name="plan" label="Invalid" invalid placeholder="Choose a plan" :options="['starter' => 'Starter', 'team' => 'Team']" aria-describedby="plan-error" />
        <p id="plan-error" class="text-sm text-destructive">Choose a plan to continue.</p>
    </div>
    <div class="flex flex-col gap-3">
        <x-ui.listbox name="size-sm" size="sm" placeholder="Small" :options="['a' => 'Small']" />
        <x-ui.listbox name="size-md" placeholder="Medium" :options="['a' => 'Medium']" />
        <x-ui.listbox name="size-lg" size="lg" placeholder="Large" :options="['a' => 'Large']" />
    </div>
</div>

<div class="mx-auto grid w-full max-w-md gap-2">
    <div class="flex items-center justify-between gap-3">
        <x-ui.label for="cookbook-team-name">Team name</x-ui.label>
        <span class="text-xs text-muted-foreground">Required</span>
    </div>

    <x-ui.input
        id="cookbook-team-name"
        wire:model.blur="form.team_name"
        autocomplete="organization"
        value="Design Operations"
    />

    <p class="text-sm text-muted-foreground">
        Use the public name your teammates will recognize.
    </p>
</div>

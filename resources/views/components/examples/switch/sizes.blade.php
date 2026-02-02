<div class="flex flex-col gap-3 w-full">
    <label for="switch_xs" class="flex items-center gap-x-1">
        <x-ui.switch size="xs" name="switch_xs" id="switch_xs" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Xs</span>
    </label>
    <label for="switch_sm" class="flex items-center gap-x-1">
        <x-ui.switch size="sm" name="switch_sm" id="switch_sm" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">SM</span>
    </label>
    <label for="switch_normal" class="flex items-center gap-x-1">
        <x-ui.switch name="switch_normal" id="switch_normal" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">MD</span>
    </label>
    <label for="switch_lg" class="flex items-center gap-x-1">
        <x-ui.switch size="lg" name="switch_lg" id="switch_lg" class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">LG</span>
    </label>
</div>
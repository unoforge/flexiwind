<div class="flex flex-col gap-3">
    <label for="switch" class="flex items-center gap-x-1">
        <x-ui.switch name="switch" id="switch"
            class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Use
            Dark Theme</span>
    </label>
    <label for="switch_lab1" class="flex items-center gap-x-1">
        <x-ui.switch checked name="switch_lab1" id="switch_lab1"
            class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Checked</span>
    </label>
    <label for="switch_lab_2" class="flex items-center gap-x-1">
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 me-3">No</span>
        <x-ui.switch name="switch_lab_2" id="switch_lab_2"
            class="bg-bg-muted text-primary-600 [--knob-bg:var(--color-white)]" />
        <span class="text-sub-title peer-disabled:pointer-events-none peer-disabled:opacity-50 ms-3">Yes</span>
    </label>
</div>

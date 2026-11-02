<div class="flex flex-wrap items-center gap-6">
    <x-ui.radio id="rd-default" name="rd-colors-a" label="Default" checked />
    <x-ui.radio id="rd-light" name="rd-colors-b" label="Light dot" checked
        class="checked:bg-background checked:border-primary! [--checkbox-mark-color:var(--color-primary)] [--radio-dot-size:50%]" />
    <x-ui.radio id="rd-invalid" name="rd-colors-c" label="Required" invalid />
</div>

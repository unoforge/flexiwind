<div class="flex flex-wrap items-center gap-6">
    <x-ui.checkbox id="cb-default" label="Default" checked />
    <x-ui.checkbox id="cb-light" label="Light box" checked
        class="checked:bg-background checked:border-primary! [--checkbox-mark-color:var(--color-primary)]" />
    <x-ui.checkbox id="cb-success" label="Success" checked class="[--checkbox-checked-color:var(--color-success)] [--checkbox-mark-color:var(--color-background)]" />
    <x-ui.checkbox id="cb-invalid" label="Required" invalid />
</div>

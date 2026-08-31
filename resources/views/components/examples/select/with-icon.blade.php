<form action="#" class="space-y-4 max-w-sm w-full">
    <x-ui.input.group>
        <x-ui.select variant="unstyled" name="select-country_label_1" id="select-country_label_1" class="ps-9 px-3">
            <option value="DRC">DR Congo</option>
            <option value="TZ">Tanzania</option>
            <option value="MA">Morocco</option>
            <option value="NG">Nigeria</option>
        </x-ui.select>
        <x-ui.input.leading absolute class="text-muted-foreground">
            <x-ui.icon name="ph--flag" class="flex text-sm" />
        </x-ui.input.leading>
    </x-ui.input.group>

    <x-ui.input.group>
        <x-ui.input.leading aria-hidden="true"
            class="py-2 px-3 text-muted-foreground bg-muted rounded-l-ui">
            <x-ui.icon name="ph--flag" class="flex size-4" />
        </x-ui.input.leading>
        <x-ui.select variant="unstyled" class="rounded-r-ui px-3" name="select-country_label_2" id="select-country_label_2">
            <option value="DRC">DR Congo</option>
            <option value="TZ">Tanzania</option>
            <option value="MA">Morocco</option>
            <option value="NG">Nigeria</option>
        </x-ui.select>
    </x-ui.input.group>
</form>

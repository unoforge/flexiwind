<form action="#" class="space-y-4 w-full text-fg">
    <x-ui.input.group>
        <x-ui.select un-stylled name="select-country_label_1" id="select-country_label_1" class="ps-13 px-3">
            <option value="DRC">DR Congo</option>
            <option value="TZ">Tanzania</option>
            <option value="MA">Morocco</option>
            <option value="NG">Nigeria</option>
        </x-ui.select>
        <x-ui.input.leading absolute class="text-fg">
            <span aria-hidden="true" class="flex iconify ph--flag text-lg"></span>
        </x-ui.input.leading>
    </x-ui.input.group>

    <x-ui.input.group>
        <x-ui.input.leading aria-hidden="true"
            class="p-2 text-fg bg-bg-subtle rounded-r-ui">
            <span aria-hidden="true" class="flex iconify ph--flag text-lg"></span>
        </x-ui.input.leading>
        <x-ui.select un-stylled class="rounded-r-ui" name="select-country_label_2" id="select-country_label_2">
            <option value="DRC">DR Congo</option>
            <option value="TZ">Tanzania</option>
            <option value="MA">Morocco</option>
            <option value="NG">Nigeria</option>
        </x-ui.select>
    </x-ui.input.group>
</form>

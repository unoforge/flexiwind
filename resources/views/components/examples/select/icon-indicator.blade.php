<div class="relative w-full">
    <x-ui.select name="select-country" id="select-country" class="pe-9" :indicator="false">
        <option value="DRC">DR Congo</option>
        <option value="TZ">Tanzania</option>
        <option value="MA">Morocco</option>
        <option value="NG">Nigeria</option>
    </x-ui.select>
    <span aria-hidden="true"
        class="absolute right-3 inset-y-px text-muted-foreground pointer-events-none flex items-center">
        <x-ui.icon name="ph--caret-up-down" class="flex text-sm" />                             
    </span>
</div>
<div class="relative w-full">
    <x-ui.select name="select-country" id="select-country" class="pe-9" :indicator="false">
        <option value="DRC">DR Congo</option>
        <option value="TZ">Tanzania</option>
        <option value="MA">Morocco</option>
        <option value="NG">Nigeria</option>
    </x-ui.select>
    <span aria-hidden="true"
        class="absolute right-3 inset-y-px text-fg-muted pointer-events-none flex items-center">
        <span class="flex iconify ph--caret-up-down text-sm"></span>                             
    </span>
</div>
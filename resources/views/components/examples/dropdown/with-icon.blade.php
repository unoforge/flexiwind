 <x-ui.dropdown.trigger variant="outline" size="sm" dropdownId="dealDropdown-2">
    More Options
    <span class="iconify ph--caret-down ml-2 text-xs"></span>
 </x-ui.dropdown.trigger>

 <x-ui.dropdown class="w-48" id="dealDropdown-2">
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <span class="iconify ph--eye"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             View deal
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <span class="iconify ph--archive"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Archive lead
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item danger>
         <x-ui.dropdown.icon>
             <span class="iconify ph--trash"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Delete
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
 </x-ui.dropdown>

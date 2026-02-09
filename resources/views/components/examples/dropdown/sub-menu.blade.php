 <x-ui.dropdown.trigger variant="outline" size="sm" dropdown-id="with-submenu">
     More Options
     <span class="iconify ph--caret-down ml-2 text-xs"></span>
 </x-ui.dropdown.trigger>

 <x-ui.dropdown keep-open placement="bottom-start" class="w-46" id="with-submenu">
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <span class="iconify ph--eye text-sm"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             View deal
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item-submenu dropdown-id="dropdown-submenu">
         <x-ui.dropdown.icon>
             <span class="iconify ph--archive text-sm"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Transaction
         </x-ui.dropdown.label>
     </x-ui.dropdown.item-submenu>
     <x-ui.dropdown is-sub-menu class="w-36" id="dropdown-submenu">
         <x-ui.dropdown.item>
             <x-ui.dropdown.icon>
                 <span class="iconify ph--chart-line-up text-sm"></span>
             </x-ui.dropdown.icon>
             <x-ui.dropdown.label>
                 Income
             </x-ui.dropdown.label>
         </x-ui.dropdown.item>
         <x-ui.dropdown.item>
             <x-ui.dropdown.icon>
                 <span class="iconify ph--chart-line-down text-sm"></span>
             </x-ui.dropdown.icon>
             <x-ui.dropdown.label>
                 Outcome
             </x-ui.dropdown.label>
         </x-ui.dropdown.item>
     </x-ui.dropdown>
     <x-ui.dropdown.item danger>
         <x-ui.dropdown.icon>
             <span class="iconify ph--trash text-sm"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Delete
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
 </x-ui.dropdown>

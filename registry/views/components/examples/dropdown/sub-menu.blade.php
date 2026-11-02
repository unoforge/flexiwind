 <x-ui.dropdown.trigger variant="outline" size="sm" dropdown-id="with-submenu">
     More Options
     <x-ui.icon name="ph--caret-down" class="ml-2 text-xs" />
 </x-ui.dropdown.trigger>

 <x-ui.dropdown keep-open placement="bottom-start" class="w-46" id="with-submenu">
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--eye" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             View deal
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item-submenu dropdownId="dropdown-submenu">
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--archive" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Transaction
         </x-ui.dropdown.label>
     </x-ui.dropdown.item-submenu>
     <x-ui.dropdown.item intent="destructive">
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--trash" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Delete
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
 </x-ui.dropdown>
 <x-ui.dropdown submenu class="w-34" id="dropdown-submenu">
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--chart-line-up" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Income
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--chart-line-down" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Outcome
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
 </x-ui.dropdown>

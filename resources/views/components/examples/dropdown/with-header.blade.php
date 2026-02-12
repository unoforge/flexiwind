 <x-ui.dropdown.trigger variant="outline" size="sm" dropdownId="profile-1">
    Options
    <span class="iconify ph--caret-down ml-2 text-xs in-[aria-expanded]:rotate-180"></span>
 </x-ui.dropdown.trigger>

 <x-ui.dropdown placement="bottom-start" class="w-54" id="profile-1">
    <x-ui.dropdown.header class="flex items-center gap-x-3 px-2 pt-2 pb-1">
        <x-ui.avatar-placeholder variant="subtle" size="lg">
            <span class="flex iconify ph--user"></span>
        </x-ui.avatar-placeholder>

        <div class="flex items-start flex-col">
            <h4 class="font-semibold text-fg-title text-sm">Tresor Kasenda</h4>
            <span class="text-xs text-fg-muted">Web Developer</span>
        </div>
    </x-ui.dropdown.header>
    <x-ui.dropdown.separator class="border-border"/>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <span class="iconify ph--pen text-sm"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Edit Profile
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <span class="iconify ph--gear text-sm"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Settings
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <span class="iconify ph--wallet text-sm"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
              Billing
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item danger>
         <x-ui.dropdown.icon>
             <span class="iconify ph--sign-out text-sm"></span>
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
              Logout
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
 </x-ui.dropdown>

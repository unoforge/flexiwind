 <x-ui.dropdown.trigger variant="outline" size="sm" dropdownId="profile-1">
    Options
    <x-ui.icon name="ph--caret-down" class="ml-2 text-xs in-[aria-expanded]:rotate-180" />
 </x-ui.dropdown.trigger>

 <x-ui.dropdown placement="bottom-start" class="w-54" id="profile-1">
    <x-ui.dropdown.header class="flex items-center gap-x-3 px-2 pt-2 pb-1">
        <x-ui.avatar-placeholder variant="subtle" size="lg">
            <x-ui.icon name="ph--user" class="flex" />
        </x-ui.avatar-placeholder>

        <div class="flex items-start flex-col">
            <h4 class="font-semibold text-foreground text-sm">Tresor Kasenda</h4>
            <span class="text-xs text-muted-foreground">Web Developer</span>
        </div>
    </x-ui.dropdown.header>
    <x-ui.dropdown.separator class="border-border"/>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--pen" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Edit Profile
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--gear" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
             Settings
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item>
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--wallet" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
              Billing
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
     <x-ui.dropdown.item intent="destructive">
         <x-ui.dropdown.icon>
             <x-ui.icon name="ph--sign-out" class="text-sm" />
         </x-ui.dropdown.icon>
         <x-ui.dropdown.label>
              Logout
         </x-ui.dropdown.label>
     </x-ui.dropdown.item>
 </x-ui.dropdown>

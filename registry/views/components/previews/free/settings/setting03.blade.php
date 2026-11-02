<div class="max-w-2xl w-full p-4 mx-auto">
    <div class="bg-surface border border-border-strong/40 ring-2 ring-border rounded-lg">
        <div class="p-6 border-b border-border-strong">
            <h4 class="text-lg font-semibold text-title-foreground ">
                Account Settings
            </h4>
            <p class="text-sm text-foreground">
                Manage your account information and preferences
            </p>
        </div>
        <div class="p-6 grid md:grid-cols-2 gap-y-6 gap-x-4">
            <div class="flex flex-col space-y-2">
                <x-ui.label>First Name</x-ui.label>
                <x-ui.input type="text" class="text-sm" value="Sarah" placeholder="Enter first name" />
            </div>
            <div class="flex flex-col space-y-2">
                <x-ui.label>Last Name</x-ui.label>
                <x-ui.input type="text" class="text-sm" value="Chen" placeholder="Enter last name" />
            </div>
            <div class="flex flex-col space-y-2 col-span-full">
                <x-ui.label>Email Address</x-ui.label>
                <x-ui.input type="email" class="text-sm" value="sarah.chen@company.com"
                    placeholder="Enter email address" />
            </div>
            <div class="flex flex-col space-y-2 col-span-full">
                <x-ui.label>Job Title</x-ui.label>
                <x-ui.input type="text" class="text-sm" value="Senior Product Designer"
                    placeholder="Enter job title" />
            </div>
            <div class="flex flex-col space-y-2 col-span-full">
                <x-ui.label>Time Zone</x-ui.label>
                <x-ui.select class="text-sm">
                    <option>Pacific Standard Time (PST)</option>
                    <option>Mountain Standard Time (MST)</option>
                    <option>Central Standard Time (CST)</option>
                    <option>Eastern Standard Time (EST)</option>
                </x-ui.select>
            </div>
            <div class="flex justify-end space-x-3 pt-4 border-t border-border col-span-full">
                <x-ui.button size="sm" variant="outline">
                    Cancel
                </x-ui.button>
                <x-ui.button size="sm">
                    Save Changes
                </x-ui.button>
            </div>
        </div>
    </div>
</div>

<div class="max-w-xl w-full p-4 mx-auto">
    <div class="bg-background rounded-lg shadow border border-border-strong/70 p-6">
        <h3 class="text-lg font-semibold text-title-foreground  mb-6">
            Project Settings
        </h3>
        <form class="space-y-6">
            <div class="flex flex-col space-y-2">
                <x-ui.label for="project-name">Project Name</x-ui.label>
                <x-ui.input type="text" id="project-name" placeholder="Enter project name" class="" />
            </div>

            <!-- Description -->
            <div class="flex flex-col space-y-2">
                <x-ui.label for="description">Description</x-ui.label>
                <x-ui.textarea id="description" rows="3" placeholder="Describe your project..."
                    class="resize-none h-24"></x-ui.textarea>
            </div>

            <!-- Date Range -->
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col space-y-2">
                    <x-ui.label for="start-date">Start Date</x-ui.label>
                    <x-ui.input type="date" id="start-date" />
                </div>
                <div class="flex flex-col space-y-2">
                    <x-ui.label for="end-date">End Date</x-ui.label>
                    <x-ui.input type="date" id="end-date" class=" bg-bg" />
                </div>
            </div>

            <!-- Priority -->
            <div>
                <x-ui.label class="block text-sm font-medium text-foreground mb-3">Priority Level</x-ui.label>
                <div class="grid grid-cols-3 gap-3">

                    <label
                        class="btn btn-md cursor-pointer [--btn-focus-outline-color:var(--color-primary)] rounded-md ui-subtle ui-subtle-gray has-checked:ui-subtle-primary justify-center text-center">
                        <input type="radio" name="priority" value="low" class="sr-only" />
                        <span class="text-sm font-medium capitalize">Low</span>
                    </label>
                    <label
                        class="btn btn-md cursor-pointer [--btn-focus-outline-color:var(--color-primary)] rounded-md ui-subtle ui-subtle-gray has-checked:ui-subtle-primary justify-center text-center"
                        data-priority="medium">
                        <input type="radio" name="priority" value="medium" class="sr-only" checked />
                        <span class="text-sm font-medium capitalize">Medium</span>
                    </label>
                    <label
                        class="btn btn-md cursor-pointer [--btn-focus-outline-color:var(--color-primary)] rounded-md ui-subtle ui-subtle-gray has-checked:ui-subtle-primary justify-center text-center"
                        data-priority="medium">
                        <input type="radio" name="priority" value="high" class="sr-only" checked />
                        <span class="text-sm font-medium capitalize">High</span>
                    </label>
                </div>
            </div>

            <!-- Toggles -->
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <x-ui.label for="is_public" class="text-sm font-medium text-foreground">Public Project</x-ui.label>
                        <p class="text-sm text-gray-500">
                            Allow others to view this project
                        </p>
                    </div>
                    <x-ui.switch name="is_public" id="is_public" class="text-primary [--knob-bg:var(--color-white)] bg-muted/80" />
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <x-ui.label for="email_notif" class="text-sm font-medium text-foreground">Email
                            Notifications</x-ui.label>
                        <p class="text-sm text-gray-500">
                            Receive updates about this project
                        </p>
                    </div>
                    <x-ui.switch name="email_notif" id="email_notif"
                        class="text-primary [--knob-bg:var(--color-white)] bg-muted/80" />
                </div>
            </div>

            <!-- Form Actions -->
            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-border">
                <x-ui.button type="button" variant="outline" size="sm">
                    Reset
                </x-ui.button>
                <x-ui.button type="submit" size="sm">
                    Create Project
                </x-ui.button>
            </div>
        </form>
    </div>
</div>

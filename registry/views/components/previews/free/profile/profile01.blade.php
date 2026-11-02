      <div class="max-w-xl w-full px-4 mx-auto py-5">
          <div class="bg-background rounded-lg shadow border border-border-strong/70 p-6">
              <h3 class="text-lg font-semibold text-title-foreground  mb-6" data-testid="profile-form-title">
                  User Profile Form
              </h3>
              <form class="grid grid-cols-2 gap-y-6 gap-x-4" id="profile-form">
                  <div class="flex items-center space-x-6 col-span-full">
                      <img src="/avatar1.webp" alt="Profile picture" width="200"
                          height="200" class="size-20 rounded-full border-4 border-border-strong" />
                      <div>
                          <input type="file" name="profile_pic" id="profile_pic" class="sr-only" />
                          <label for="profile_pic" class="btn btn-sm btn-soft btn-soft-primary rounded-md w-max">
                              Change Photo
                          </label>
                          <p class="text-xs text-gray-500 mt-1">
                              JPG, GIF or PNG. 1MB max.
                          </p>
                      </div>
                  </div>
                  <div class="flex flex-col space-y-2">
                      <x-ui.label for="first-name">First Name</x-ui.label>
                      <x-ui.input type="text" id="first-name" value="John" class="text-sm"
                          data-testid="input-first-name" />
                  </div>
                  <div class="flex flex-col space-y-2">
                      <x-ui.label for="last-name">Last Name</x-ui.label>
                      <x-ui.input type="text" id="last-name" value="Doe" class="text-sm"
                          data-testid="input-last-name" />
                  </div>

                  <div class="flex flex-col space-y-2 col-span-full">
                      <x-ui.label for="email">Email Address</x-ui.label>
                      <x-ui.input type="email" id="email" value="john.doe@company.com" class="text-sm"
                          data-testid="input-email" />
                  </div>

                  <div class="flex flex-col space-y-2 col-span-full">
                      <x-ui.label for="role">Role</x-ui.label>
                      <x-ui.select id="role" class="text-sm" data-testid="select-role">
                          <option value="Administrator" selected>Administrator</option>
                          <option value="Manager">Manager</option>
                          <option value="Employee">Employee</option>
                      </x-ui.select>
                  </div>

                  <div class="flex flex-col space-y-2 col-span-full">
                      <x-ui.label for="bio">Bio</x-ui.label>
                      <x-ui.textarea id="bio" rows="3" placeholder="Tell us about yourself..."
                          class="w-full text-sm h-24 resize-none" data-testid="textarea-bio"></x-ui.textarea>
                  </div>

                  <div class="flex items-center justify-end space-x-3 pt-4 border-t border-border col-span-full">
                      <x-ui.button type="button" variant="soft" size="sm">
                          Cancel
                      </x-ui.button>
                      <x-ui.button type="submit" size="sm">
                          Save Changes
                      </x-ui.button>
                  </div>
              </form>
          </div>
      </div>

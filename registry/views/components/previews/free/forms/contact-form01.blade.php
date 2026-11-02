<div class="max-w-2xl px-4 mx-auto">
    <x-ui.card size="none" class="p-6 sm:p-8 rounded-ui">
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-title-foreground ">Get in Touch</h2>
            <p class="text-muted-foreground mt-2">
                We'd love to hear from you. Send us a message and we'll respond as
                soon as possible.
            </p>
        </div>
        <form class="grid grid-cols-2 gap-y-6 gap-x-4">
            <x-ui.input type="text" placeholder="John" label="First Name *" />
            <x-ui.input type="text" placeholder="Doe" label="Last Name *" />

            <x-ui.input id="email_ad" type="email" placeholder="john@example.com"
                groupWrapperClass="col-span-full" label="Email Address *" />

            <x-ui.select groupWrapperClass="col-span-full" label="Subject">
                <option>General Inquiry</option>
                <option>Technical Support</option>
                <option>Sales Question</option>
                <option>Partnership</option>
            </x-ui.select>
            <x-ui.textarea groupWrapperClass="col-span-full" label="Message *"
                placeholder="Tell us how we can help you..." class="h-32 resize-none pt-3" />

            <div class="flex items-center col-span-full">
                <x-ui.checkbox id="agree" class="mr-3" required />
                <x-ui.label for="agree" class="text-sm text-foreground">I agree to the
                    <x-ui.link href="#" class="text-primary hover:underline">Terms of Service</x-ui.link>
                    and
                    <x-ui.link href="#" class="text-primary hover:underline">Privacy
                        Policy</x-ui.link>
                </x-ui.label>
            </div>
            <div class="flex gap-4 col-span-full">
                <x-ui.button type="submit" size="sm" class="justify-center flex-1">
                    Send Message
                </x-ui.button>
                <x-ui.button type="reset" size="sm" variant="outline" intent="gray">
                    Clear Form
                </x-ui.button>
            </div>
        </form>
    </x-ui.card>
</div>

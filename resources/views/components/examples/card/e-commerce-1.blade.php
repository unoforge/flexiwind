<x-ui.card fill="gray" size="xs" class="space-y-3 mx-auto max-w-sm">
    <div class="px-4 pt-2">
        <span class="text-fg-subtitle text-sm">
            Top Seller
        </span>
    </div>
    <img src="/images/sports-shoe.webp" alt="Sport Shoe" class="w-full h-auto rounded-md">
    <x-ui.card.content gap="2" class="px-4 pb-2 text-sm">
        <div class="flex justify-between items-start gap-2">
            <x-ui.card.title size="none" class="flex-1 text-fg-title font-medium" text="Air Nike" />
            <span class="text-fg-subtitle">12$</span>
        </div>
        <div class="flex justify-between items-start gap-2 text-sm">
            <x-ui.card.description class="flex-1" text="Colored" />
            <x-ui.button size="xs" intent="neutral">
                Add to card
            </x-ui.button>
        </div>
    </x-ui.card.content>
</x-ui.card>

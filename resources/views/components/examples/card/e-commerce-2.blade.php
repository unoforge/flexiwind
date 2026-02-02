<x-ui.card fill="gray" size="sm" class="max-w-sm mx-auto">
    <div class="relative">
        <div class="absolute inset-x-1 top-1 flex justify-between items-center  text-white text-xs">
            <span class="bg-gray-900/80 px-2 py-px rounded-full">
                -40%
            </span>
            <button aria-label="add to favorite"
                class="p-1.5 bg-gray-900/80 backdrop-filter backdrop-blur-sm rounded-full">
                <span aria-hidden="true" class="flex iconify ph--heart"></span>
            </button>
        </div>
        <img src="/images/bottes-cuir.webp" alt="bottes cuir" class="w-full h-auto rounded-md">
    </div>
    <div class="flex justify-between items-start gap-2 px-4 pt-3 pb-2 text-sm">
        <x-ui.card.title weight="medium" size="none" class="flex-1" text="Air Nike"/>
        <span class="text-fg-subtitle">12$</span>
    </div>
</x-ui.card>

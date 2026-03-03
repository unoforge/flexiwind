<x-ui.pagination>
        <x-ui.pagination.content>
            <x-ui.pagination.item>
                <x-ui.pagination.link href="#" class="pl-2">
                    <span aria-hidden class="iconify ph--caret-left mr-1"></span>
                    Previous
                </x-ui.pagination.link>
            </x-ui.pagination.item>
            <x-ui.pagination.item>
                <x-ui.pagination.link isIconOnly :isActive="true" href="#">1</x-ui.pagination.link>
            </x-ui.pagination.item>
            <x-ui.pagination.item>
                <x-ui.pagination.link isIconOnly href="#">2</x-ui.pagination.link>
            </x-ui.pagination.item>
            <x-ui.pagination.item>
                <x-ui.pagination.link isIconOnly href="#">3</x-ui.pagination.link>
            </x-ui.pagination.item>
            <x-ui.pagination.item>
                <x-ui.pagination.ellipsis />
            </x-ui.pagination.item>
            <x-ui.pagination.item>
                <x-ui.pagination.link isIconOnly href="#">10</x-ui.pagination.link>
            </x-ui.pagination.item>
            <x-ui.pagination.item>
                <x-ui.pagination.link href="#" class="pr-2">
                    Next
                    <span aria-hidden class="iconify ph--caret-right ml-1"></span>
                </x-ui.pagination.link>
            </x-ui.pagination.item>
        </x-ui.pagination.content>
    </x-ui.pagination>
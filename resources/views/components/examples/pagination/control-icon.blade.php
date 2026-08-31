<x-ui.pagination>
        <x-ui.pagination.content>
            <x-ui.pagination.item>
                <x-ui.pagination.link href="#" class="pl-2">
                    <x-ui.icon name="ph--caret-left" class="mr-1" />
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
                    <x-ui.icon name="ph--caret-right" class="ml-1" />
                </x-ui.pagination.link>
            </x-ui.pagination.item>
        </x-ui.pagination.content>
    </x-ui.pagination>
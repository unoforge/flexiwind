<?php

use Livewire\Component;
use Illuminate\Support\Facades\Config;

new class extends Component {
    public $selectedGroup = 'all';
    public $selectedCategories = [];
    public $groups = [
        [
            'id' => 'all',
            'text' => 'All',
            'icon' => 'ph--squares-four-duotone',
        ],
        [
            'id' => 'application',
            'text' => 'Application',
            'icon' => 'ph--desktop-duotone',
        ],
        [
            'id' => 'marketing',
            'text' => 'Marketing',
            'icon' => 'ph--megaphone-duotone',
        ],
    ];

    public function getCategoriesProperty()
    {
        $blocksConfig = Config::get('blocks');
        $categories = [];

        if ($this->selectedGroup === 'all') {
            // Get all categories from all groups
            foreach ($blocksConfig as $groupKey => $groupData) {
                if (is_array($groupData)) {
                    foreach ($groupData as $categoryKey => $categoryData) {
                        $blockCount = isset($categoryData['blocks']) ? count($categoryData['blocks']) : 0;
                        $categories[] = [
                            'id' => $categoryKey,
                            'name' => $categoryData['title'] ?? ucfirst($categoryKey),
                            'illustrations' => $categoryData['illustrations'],
                            'count' => $blockCount,
                            'group' => $groupKey,
                        ];
                    }
                }
            }
        } else {
            if (isset($blocksConfig[$this->selectedGroup]) && is_array($blocksConfig[$this->selectedGroup])) {
                foreach ($blocksConfig[$this->selectedGroup] as $categoryKey => $categoryData) {
                    $blockCount = isset($categoryData['blocks']) ? count($categoryData['blocks']) : 0;
                    $categories[] = [
                        'id' => $categoryKey,
                        'name' => $categoryData['title'] ?? ucfirst($categoryKey),
                        'illustrations' => $categoryData['illustrations'],
                        'count' => $blockCount,
                        'group' => $this->selectedGroup,
                    ];
                }
            }
        }

        return $categories;
    }

    public function selectGroup($groupId)
    {
        $this->selectedGroup = $groupId;
        $this->selectedCategories = []; // Reset categories when group changes
    }

    public function toggleCategory($categoryId)
    {
        if (in_array($categoryId, $this->selectedCategories)) {
            $this->selectedCategories = array_diff($this->selectedCategories, [$categoryId]);
        } else {
            $this->selectedCategories[] = $categoryId;
        }
    }

    public function resetToAll()
    {
        $this->selectedGroup = 'all';
    }
};
?>

<section class="relative">
    <div class="mx-auto w-full lg:max-w-300 border-x border-border-strong/70 border-dashed">
        <div
            class="-mt-4.5 px-3.5 sm:px-8 md:px-16 lg:px-8 xl:px-0 mx-auto w-full max-w-3xl lg:max-w-5xl overflow-auto flex items-center gap-2">
            <div
                class="h-9 bg-bg-muted/60 backdrop-blur-sm flex items-center w-max ui-card [--card-padding:--spacing(0.5)] [--card-radius:var(--radius-ui)]">
                @foreach ($groups as $group)
                    <button wire:click="selectGroup('{{ $group['id'] }}')" wire:key="group-{{ $group['id'] }}"
                        data-state="{{ $selectedGroup === $group['id'] ? 'active' : 'inactive' }}"
                        class="text-sm cursor-pointer text-fg-muted fx-active:text-fg-title px-2 h-full flex items-center fx-active:bg-bg fx-active:ring-border/50 ring-1 ring-transparent inner-radius">
                        <span aria-hidden="true" class="iconify size-3.5 {{ $group['icon'] }} mr-1"></span>
                        <span>
                            {{ $group['text'] }}
                        </span>
                    </button>
                @endforeach
            </div>
            <div class="flex items-center h-px relative flex-1 bg-linear-to-r from-border-strong/70">
                <span class="size-2 rounded-ui bg-bg border border-border-strong/70"></span>
            </div>
        </div>
        <ul class="pb-10 px-4 sm:px-6 lg:px-8 mt-14 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-x-3.5 gap-y-6">
            @forelse ($this->categories as $category)
                <li class="flex h-full">
                    <x-blocks.block-card :group="$category['group']" :key="$category['id']" :title="$category['name']" :illustrations="$category['illustrations']" />
                </li>
            @empty
                <div class="col-span-full relative -mt-7">
                    <x-blocks.empty-state-site title="No blocks found for {{ $selectedGroup }}" description="Selected Groud doesn't have any block right now, stay tuned...">
                        <div class="mt-7 flex ">
                            <x-ui.button wire:click="resetToAll" variant="outline" size="sm">
                                Clear Filter
                            </x-ui.button>
                        </div>
                    </x-blocks.empty-state-site>
                </div>
            @endforelse
        </ul>
        <div class="h-4 linear-gradient-pattern border-y border-dashed border-border-strong/70"></div>
    </div>
</section>

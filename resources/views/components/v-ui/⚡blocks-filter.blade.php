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

    public function clearCategories()
    {
        $this->selectedCategories = [];
    }
};
?>

<x-ui.slideover.body class="pt-10">
    <!-- Groups Section -->
    <div class="mb-8">
        <span class="text-fg-title font-medium text-sm mb-3 block">
            Groups
        </span>
        <div class="flex flex-wrap gap-2">
            @foreach ($groups as $group)
                <button wire:click="selectGroup('{{ $group['id'] }}')"
                    wire:key="group-{{ $group['id'] }}-{{ $selectedGroup }}"
                    data-state="{{ $selectedGroup === $group['id'] ? 'active' : 'inactive' }}"
                    class="h-7 text-sm px-2 flex items-center rounded-ui transition-colors duration-200 ring ring-border-strong/60
                    fx-active:bg-bg-muted/50 fx-active:border-border-strong/70 fx-active:text-fg-title fx-active:shadow-md fx-active:shadow-black/5
                    text-fg-muted hover:bg-bg-muted/70 hover:text-fg-subtitle
                    ">
                    <span class="iconify size-3 {{ $group['icon'] }} mr-1.5"></span>
                    <span class="text-sm font-medium">{{ $group['text'] }}</span>
                </button>
            @endforeach
        </div>
    </div>

    <!-- Categories Section -->
    <div>
        <div class="flex items-center justify-between mb-3">
            <span class="text-fg-title font-medium text-sm">
                Categories
            </span>
            @if (count($selectedCategories) > 0)
                <button wire:click="clearCategories"
                    class="text-sm text-fg-muted hover:text-fg transition-colors duration-200">
                    Clear
                </button>
            @endif
        </div>
        <div class="flex flex-wrap gap-2">
            @forelse ($this->categories as $category)
                <a href="{{ route('blocks.show', [$category['group'], $category['id']]) }}" wire:navigate
                    wire:key="category-{{ $category['id'] }}-{{ $selectedGroup }}"
                    class="h-7 text-sm px-2 flex items-center rounded-ui transition-colors duration-200 ring ring-border-strong/60
                    fx-current:bg-bg-muted/50 fx-current:border-border-strong/70 fx-current:text-fg-title fx-current:shadow-md fx-current:shadow-black/5
                    text-fg-muted hover:bg-bg-muted/70 hover:text-fg-subtitle">
                    {{ $category['name'] }}
                    <span
                        class="ml-1 pl-1.5 opacity-70 border-l border-border-strong/90">{{ $category['count'] }}</span>
                </a>
            @empty
                <p class="text-fg-muted text-sm">No categories available for this group.</p>
            @endforelse
        </div>
    </div>
</x-ui.slideover.body>

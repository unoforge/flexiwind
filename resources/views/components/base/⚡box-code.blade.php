<?php

use Livewire\Component;
use App\Support\DocsCode;

new class extends Component {
    public ?string $title = null;
    public ?string $icon = null;
    public bool $shellStyle = false;
    private string $componentName = '';

    public array $data = [];

    public function mount(string $name, ?string $title, ?string $icon, bool $shellStyle)
    {
        $this->componentName = $name;
        $this->title = $title;
        $this->icon = $icon;
        $this->shellStyle = $shellStyle;
        $this->getCode();
    }

    private function getCode()
    {
        try {
            $this->data = DocsCode::get($this->componentName);
        } catch (\Exception) {
            $this->data = [
                'code' => '',
                'lang' => '',
            ];
        }
    }
};
?>



<div data-code-block
    class="border border-gray-200 dark:border-gray-800/60 ui-card [--card-padding:--spacing(1)] [--card-radius:var(--global-main-radius)] bg-gray-800 dark:bg-gray-900/50 grid mt-2.5 first:mt-0 text-gray-300">
    <x-docs.block-code title="{{ $title }}" icon="{{ $icon }}" shell-style="{{ $shellStyle }}">
        <x-docs.code-view-box :no-copy-button="true" class="bg-(--astro-code-color-background) inner-radius">
            <livewire:base.render-block-code :code="$data['code']" :lang="$data['lang']" :lines="$data['lines']??[]" />
        </x-docs.code-view-box>
    </x-docs.block-code>
</div>


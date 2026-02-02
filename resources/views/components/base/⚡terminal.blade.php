<?php

use Livewire\Component;

new class extends Component
{
   public string $code = '';
    public function mount(string $code)
    {
        $this->code = $code;
    }
};
?>

<div data-code-block
    class="border border-gray-200 dark:border-gray-800/60 ui-card [--card-padding:--spacing(1)] [--card-radius:var(--global-main-radius)] bg-gray-800 dark:bg-gray-900/50 grid mt-2.5 first:mt-0 text-gray-300">
    <x-docs.block-code title="Shell" icon="shell" shell-style="true">
        <x-docs.code-view-box :no-copy-button="true" class="bg-(--astro-code-color-background) inner-radius">
            <livewire:base.render-block-code :code="$code" lang="html" />
        </x-docs.code-view-box>
    </x-docs.block-code>
</div>

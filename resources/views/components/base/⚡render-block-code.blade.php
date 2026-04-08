<?php

use Livewire\Component;
use App\Support\ShikiService;

new class extends Component {
    public string $highlightedCode = '';
    public string $code = '';
    public string $lang = 'php';
    public array $lines = [];
    public string $snippetKey = '';

    public function mount(string $code, string $lang = 'php', array $lines = [])
    {
        $this->code = $code;
        $this->lang = $lang;
        $this->lines = $lines;
        $this->snippetKey = md5($this->code . $this->lang . serialize($this->lines));

        $this->highlightCode();
    }

    private function highlightCode()
    {
        $this->highlightedCode = ShikiService::highlight($this->code, $this->lang, $this->lines);
    }
};
?>


<figure data-code-snippet role="region" aria-label="codeblock region" class="py-3 w-full"
    wire:key="code-snippet-{{ $snippetKey }}">
    @if ($highlightedCode)
        {!! $highlightedCode !!}
    @else
        <div class="text-gray-500">No code to display</div>
    @endif
</figure>

@props([
    'code' => '',
    'lang' => 'php',
    'lines' => [],
])

@php
    $highlightedCode = \App\Support\ShikiService::highlight($code, $lang, $lines);
@endphp

<figure data-code-snippet role="region" aria-label="codeblock region" class="py-3 w-full">
    @if ($highlightedCode)
        {!! $highlightedCode !!}
    @else
        <div class="text-gray-500">No code to display</div>
    @endif
</figure>

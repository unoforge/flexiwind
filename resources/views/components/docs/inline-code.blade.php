@props(['text', 'noWrap' => false])
<code class="inline-code inline {{ $noWrap ? 'text-nowrap' : 'text-wrap' }}">{{ $text }}</code>

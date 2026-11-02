@props([
    'component' => '',
    'tier' => 'free',
    'title' => null,
])

@php
    use Flexiwind\Docs\ArtifactRegistry;
    use Flexiwind\Docs\Contracts\CodeHighlighter;
    use Flexiwind\Docs\Tier;

    $required = Tier::tryFrom($tier) ?? Tier::Free;
    $artifact = app(ArtifactRegistry::class)->component($component, $required);
    $isLocked = $artifact->isLocked() || ($artifact->isMissing() && ! Tier::current()->grants($required));
@endphp

@if ($isLocked)
    <x-fw-docs::locked :example="$component" label="Pro source" />
@elseif ($artifact->isMissing())
    <x-fw-docs::missing :example="$component" />
@else
    <div data-code-block class="mt-4 first:mt-0 grid rounded-ui border border-gray-200 dark:border-gray-800/60">
        <x-docs.code-view-box>
            {!! app(CodeHighlighter::class)->highlight($artifact->code(), 'blade') !!}
        </x-docs.code-view-box>
    </div>
@endif

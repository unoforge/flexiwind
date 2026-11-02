@props(['example' => ''])

@if (config('app.debug'))
    <div class="my-5 first:mt-0 rounded-ui border border-dashed border-red-400/60 bg-red-50/50 p-4 text-sm text-red-700 dark:bg-red-950/20 dark:text-red-300">
        <strong>Artifact not found:</strong> <code>{{ $example }}</code>.
        No registered source contains
        <code>components/&lt;prefix&gt;/{{ $example }}.blade.php</code>.
    </div>
@endif

<li
    {{ $attributes->merge([
        'class' => 'step before:text-fg-subtitle before:bg-bg-subtle before:border before:border-border-strong after:bg-bg-muted'
    ]) }}
>
    {{ $slot }}
</li>
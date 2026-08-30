<li
    {{ $attributes->merge([
        'class' => 'step before:text-foreground before:bg-muted before:border before:border-border-strong after:bg-muted'
    ]) }}
>
    {{ $slot }}
</li>
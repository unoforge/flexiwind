@props(['class' => ''])

<p {{ $attributes->merge(['class' => "mt-6 first:mt-0 text-foreground leading-normal $class"]) }}>
    {{ $slot }}
</p>
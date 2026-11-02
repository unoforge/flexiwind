{{--
    Le compteur : mots, ou caractères sur `max` de <x-ui.rich-text>.
    Il passe en rouge au-delà de la limite.
--}}
<span data-slot="rich-text-count" x-text="countLabel()" x-bind:class="overLimit && 'text-destructive'" aria-live="polite"
    {{ $attributes->class(['ms-auto text-xs tabular-nums text-muted-foreground']) }}></span>

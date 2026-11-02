{{-- Ce qui s'affiche quand rien ne correspond. <x-ui.command-menu.query /> répète la recherche. --}}
<div data-command-empty hidden {{ $attributes->class(['px-4 pt-6 pb-5 text-center text-sm text-muted-foreground']) }}>{{ $slot }}</div>

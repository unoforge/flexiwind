@props(['title','items'=>[]])

<nav class="flex flex-col">
    <h3 class="mb-5 text-sm text-foreground font-medium">
        {{ $title }}
    </h3>
    <ul class="flex flex-col space-y-2 text-sm text-muted-foreground">
        @foreach ($items as $item)
            <x-atoms.footer-item :text="$item['text']" :href="$item['href']"/>
        @endforeach
    </ul>
</nav>
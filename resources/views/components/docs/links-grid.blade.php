@props(['links'=>[]])

<div class="grid gap-4 sm:grid-cols-2 mt-6 first:mt-0 last:mb-0">
    @foreach ($links as $link)
        <x-docs.link-card
            :href="$link['href']"
            :title="$link['title']"
            :description="$link['description']"
            :icon="$link['icon']"
            :icon-dark="isset($link['iconDark']) ? $link['iconDark'] : null"
        />
    @endforeach
</div>
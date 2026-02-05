@php
    $links = [
        [
            'title' => 'Github Account',
            'href' => 'https://github.com/unoforge',
            'icon' => 'ph--github-logo',
        ],
        [
            'title' => 'X account',
            'href' => 'https://x.com/johnkat_Mj',
            'icon' => 'ph--x-logo',
        ],
    ];
@endphp

<div class="flex items-center gap-x-0.5">
    @foreach ($links as $link)
        <x-atoms.ui-link
            :href="$link['href']" 
            aria-label="{{ $link['title'] }}" 
            class="btn btn-icon-sm rounded-ui btn-ghost btn-ghost-gray"
        >
            <span aria-hidden="true" class="flex iconify {{ $link['icon'] }}"></span>
        </x-atoms.ui-link>
    @endforeach
</div>
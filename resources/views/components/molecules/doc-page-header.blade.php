@props([
    'breadcrumbsMain' => ['href' => '/', 'text' => 'Docddds'],
    'breadcrumbsWords' => [],
    'title',
    'subTitle' => null,
    'links' => null,
])
<header class="pt-8 xl:pt-10 pb-5 border-b border-border space-y-2.5">
    <div class="flex flex-col md:flex-row md:justify-between gap-4">
        <div class="flex-1 flex flex-col">
            <ol class="pb-3 flex items-center gap-2.5 whitespace-nowrap text-fg text-sm capitalize">
                <li>
                    <a aria-label="Go to Docs Index page" href="{{ $breadcrumbsMain['href'] }}"
                        class="flex items-center gap-1">
                        {{ $breadcrumbsMain['text'] }}
                        <span aria-hidden="true" class="flex iconify ph--caret-right"></span>
                    </a>
                </li>

                @foreach ($breadcrumbsWords as $index => $word)
                    <li @class([
                        'truncate text-fg-muted' => $index === count($breadcrumbsWords) - 1,
                        'flex items-center gap-1' => $index < count($breadcrumbsWords) - 1,
                    ])>
                        <span class="flex">{{ $word }}</span>
                        @if ($index !== count($breadcrumbsWords) - 1)
                            <span aria-hidden="true" class="flex iconify ph--caret-right"></span>
                        @endif
                    </li>
                @endforeach
            </ol>

            <h1 class="text-2xl font-semibold text-fg-title">
                {{ $title }}
            </h1>
        </div>
        <div>
            {{ $slot }}
        </div>
    </div>

    @if ($subTitle)
        <p class="text-fg">
            {{ $subTitle }}
        </p>
    @endif

    @if ($links)
        <div class="flex items-center flex-wrap gap-2">
            @foreach ($links as $link)
                @foreach ($link as $text => $href)
                    <x-atoms.doc-res-link :href="$href" :text="$text" />
                @endforeach
            @endforeach
        </div>
    @endif
</header>

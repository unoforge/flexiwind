@props(['fileName'])

@php

    $repositoryUrl = config('base.githubRepoUrl');
    $startDiscussion = config('base.discussionBaseUrl');
    $repoContentLocation =config('base.editContentBaseUrl');
    $buttonSurfaceClass = 'btn-outline btn-outline-gray text-foreground';
    $contribLinks = [
        [
            'href' => $repoContentLocation . '',
            'text' => 'Contributing',
            'icon' => 'ph--chats-circle',
        ],
        [
            'href' => $repoContentLocation . $fileName.'.blade.php',
            'text' => 'Edit this page',
            'icon' => 'ph--pencil-simple-line',
        ],
        [
            'href' => $repositoryUrl,
            'text' => 'Star On github',
            'icon' => 'ph--star',
        ],
    ];
@endphp

<div class="mb-2 pt-3 border-t border-border-strong border-dashed">
    <h2 class="text-sm font-semibold hidden lg:flex text-foreground">Community</h2>

    <nav aria-label="Contribute Links" class="mt-3 flex flex-col">
        <ol class="flex flex-col space-y-2 text-muted-foreground text-sm">
            @foreach ($contribLinks as $link)
                <li class="flex">
                    <a href="{{ $link['href'] }}" target="_blank" rel="noopener noreferrer"
                        aria-label="Link to {{ $link['text'] }}"
                        class="flex items-center gap-x-2 hover:text-foreground ease-linear duration-200">
                        <span class="flex">
                            <x-ui.icon name="{{ $link['icon'] }}" class="mr-2" />
                            <span class="flex">{{ $link['text'] }}</span>
                        </span>
                        <x-ui.icon name="ph--arrow-square-out" class="flex text-[11px]" />
                    </a>
                </li>
            @endforeach
        </ol>

        <a href="{{ $discussionLink ?? $startDiscussion }}" aria-label="Start a discussion" target="_blank"
            rel="noopener noreferrer"
            @class(['mt-3 w-max flex items-center justify-center btn btn-sm rounded-lg', $buttonSurfaceClass])>
            Start a discussion
        </a>
    </nav>
</div>

@props(['fileName'])

@php

    $repositoryUrl = config('base.githubRepoUrl');
    $startDiscussion = config('base.discussionBaseUrl');
    $repoContentLocation =config('base.editContentBaseUrl');
    $contribLinks = [
        [
            'href' => $repoContentLocation . '',
            'text' => 'Contributing',
            'icon' => 'iconify ph--chats-circle',
        ],
        [
            'href' => $repoContentLocation . $fileName.'.blade.php',
            'text' => 'Edit this page',
            'icon' => 'iconify ph--pencil-simple-line',
        ],
        [
            'href' => $repositoryUrl,
            'text' => 'Star On github',
            'icon' => 'iconify ph--star',
        ],
    ];
@endphp

<div class="mb-2 pt-3 border-t border-border-strong border-dashed">
    <h2 class="text-sm font-semibold hidden lg:flex text-fg-subtitle">Community</h2>

    <nav aria-label="Contribute Links" class="mt-3 flex flex-col">
        <ol class="flex flex-col space-y-2 text-fg-muted text-sm">
            @foreach ($contribLinks as $link)
                <li class="flex">
                    <a href="{{ $link['href'] }}" target="_blank" rel="noopener noreferrer"
                        aria-label="Link to {{ $link['text'] }}"
                        class="flex items-center gap-x-2 hover:text-fg-title ease-linear duration-200">
                        <span class="flex">
                            <span aria-hidden="true" class="flex mr-2 {{ $link['icon'] }}"></span>
                            <span class="flex">{{ $link['text'] }}</span>
                        </span>
                        <span aria-hidden="true" class="flex iconify ph--arrow-square-out text-[11px]"></span>
                    </a>
                </li>
            @endforeach
        </ol>

        <a href="{{ $discussionLink ?? $startDiscussion }}" aria-label="Start a discussion" target="_blank"
            rel="noopener noreferrer"
            class="mt-3 w-max flex items-center justify-center btn btn-sm rounded-lg btn-flexi btn-flexi-white text-fg-title">
            Start a discussion
        </a>
    </nav>
</div>

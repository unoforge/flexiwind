@props(['links' => [], 'current' => [], 'prevSlug' => '', 'nextSlug' => ''])

@php
    use App\Support\UrlHelper;

    $breadcrumbs = [
        'components' => ['href' => '/components', 'text' => 'Components'],
        'docs' => ['href' => '/docs', 'text' => 'Docs'],
    ];

    $repoContentLocation = config('base.editContentBaseUrl');
    $path = '/' . ltrim(request()->path() ?: '', '/');
    $filePath = ltrim(substr($path, strrpos($path, '/') + 1), '/') ?: trim($path, '/');
    $words = UrlHelper::splitSlug($filePath);
    $breadcrumbsMain = str_contains($path, '/components') ? $breadcrumbs['components'] : $breadcrumbs['docs'];
    $contentLocation = trim($path, '/');
    $pageUrl = url($contentLocation);

    $aiPrompt = "Tell me about the {$current['title']} component in Flexiwind: {$current['description']}. Documentation: {$pageUrl}";
    $chatGptUrl = 'https://chat.openai.com/?q=' . urlencode($aiPrompt);
    $claudeUrl = 'https://claude.ai/new?q=' . urlencode($aiPrompt);

    $slotHtml = (string) $slot;

@endphp

<main class="grid xl:grid-cols-[1fr_15rem]">
    <article data-pagefind-body class="px-4 sm:px-8 xl:px-16 grid text-foreground h-max relative">
        <div class="absolute bottom-0 top-1 sm:top-2 inset-x-1 sm:inset-x-2 border border-b-0 border-border bg-background  dark:bg-gray-900/50 rounded-t-2xl"></div>
        <div class="w-full xl:max-w-2xl mx-auto relative mb-13">
            <x-molecules.doc-page-header :title="$current['title']" :sub-title="$current['description']" :links="$links" :breadcrumbs-main="$breadcrumbsMain"
                :breadcrumbs-words="$words">
                <div class="flex items-center divide-x divide-border">
                    <x-ui.button size="sm" variant="outline" intent="gray" class="rounded-r-none" data-copy-markdown>
                        <x-ui.icon name="ph--copy" class="flex text-sm mr-1.5" />
                        <span>Copy page</span>
                    </x-ui.button>
                    <x-ui.dropdown.trigger size="sm" iconOnly variant="outline" intent="gray" dropdown-id="ui-more-options" class="rounded-l-none">
                        <x-ui.icon name="ph--caret-down" class="text-xs" />
                    </x-ui.dropdown.trigger>
                    <x-ui.dropdown placement="bottom-end" id="ui-more-options">
                        <x-ui.dropdown.item href="{{ $chatGptUrl }}" target="_blank" rel="noopener noreferrer">
                            <x-ui.dropdown.icon>
                                <x-ui.icon name="ph--open-ai-logo" class="flex" />
                            </x-ui.dropdown.icon>
                            <x-ui.dropdown.label>
                                Open with ChatGPT
                            </x-ui.dropdown.label>
                        </x-ui.dropdown.item>
                        <x-ui.dropdown.item href="{{ $claudeUrl }}" target="_blank" rel="noopener noreferrer">
                            <x-ui.dropdown.icon>
                                <x-ui.icon name="ph--chat" class="flex" />
                            </x-ui.dropdown.icon>
                            <x-ui.dropdown.label>
                                Open with Claude
                            </x-ui.dropdown.label>
                        </x-ui.dropdown.item>
                    </x-ui.dropdown>
                </div>
            </x-molecules.doc-page-header>
            <div data-doc-content class="py-10 w-full grid">
                {{ $slot }}
            </div>
            <div>
                <x-atoms.ui-link href="{{ $repoContentLocation }}{{ $contentLocation }}.blade.php"
                    aria-label="edit this page on github"
                    class="w-max flex items-center gap-x-2 underline underline-dashed underline-offset-3 hover:text-foreground">
                    <x-ui.icon name="ph--pencil-simple-line" class="flex" />
                    Edit this page
                </x-atoms.ui-link>
            </div>
            <div class="flex w-full hpx my-8 border-b border-border"></div>
            <x-molecules.doc-pagination :prev-slug="$prevSlug" :next-slug="$nextSlug" />
        </div>
    </article>
    <x-molecules.box-table-of-content :content-html="$slotHtml" :file-name="$contentLocation" :contrib-url="$repoContentLocation" />
</main>

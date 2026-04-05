@props([
    'seo' => [
        'ogImage' => [
            'src' => '/blocks-light.webp',
            'alt' => 'Flexiwind Cover',
        ],
        'keywords' => '',
        'title' => '',
        'description' => '',
    ],
    'siteUrl' => 'https://flexiwind.unoforge.com',
    'siteDomain' => 'flexiwind.unoforge.com',
])

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="icon" type="image/png" href="{{ asset('favicon.png') }}" />
<link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}" />
<meta name="title" content="{{ $seo['title'] }}" />
<meta property="og:url" content="{{ $siteUrl }}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $seo['title'] }}" />
<meta property="og:description" content="{{ $seo['description'] }}" />
<meta property="og:image" content="{{ $seo['ogImage']['src'] }}" />
<meta property="og:image:type" content="image/png">
<meta property="og:image:alt" content="{{ $seo['ogImage']['alt'] }}" />
<meta name="og:image:width" content="1181" />
<meta name="og:image:height" content="578" />

<meta name="twitter:card" content="summary_large_image" />
<meta property="twitter:domain" content="{{ $siteDomain }}" />
<meta property="twitter:url" content="{{ $siteUrl }}" />
<meta name="twitter:title" content="{{ $seo['title'] }}" />
<meta name="twitter:description" content="{{ $seo['description'] }}" />
<meta name="twitter:image" content="{{ $seo['ogImage']['src'] }}" />
<meta name="twitter:image:type" content="image/png">
<meta name="twitter:image:alt" content="{{ $seo['ogImage']['alt'] }}" />
<meta name="twitter:image:width" content="1181" />
<meta name="twitter:image:height" content="578" />
<meta name="twitter:creator" content="@johnkat-mj" />

<meta name="application-name" content="Flexiwind Website" />
<meta name="keywords" content="{{ $seo['keywords'] }}" />
<meta name="generator" content="Laravel" />
<meta name="author" content="Johnkat-MJ" />
<link rel="creator" href="https://github.com/Johnkat-Mj" />
<link rel="author" href="https://x.com/johnkat_Mj" />

{{ $slot }}
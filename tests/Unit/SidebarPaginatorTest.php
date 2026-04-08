<?php

use App\Support\SidebarPaginator;
use Tests\TestCase;

uses(TestCase::class);

test('it returns the current sidebar item by slug', function () {
    $current = SidebarPaginator::getCurrent('/docs/introduction');

    expect($current)
        ->not->toBeNull()
        ->and($current['title'])->toBe('Introduction')
        ->and($current['slug'])->toBe('/docs/introduction');
});

test('it returns previous and next sidebar items for known slugs', function () {
    $page = SidebarPaginator::getPagger('/docs/installation');

    expect($page['prev'])->not->toBeNull()
        ->and($page['current'])->not->toBeNull()
        ->and($page['next'])->not->toBeNull()
        ->and($page['prev']['slug'])->toBe('/docs/introduction')
        ->and($page['current']['slug'])->toBe('/docs/installation')
        ->and($page['next']['slug'])->toBe('/docs/cli');
});

test('it returns empty pagination data for unknown slugs', function () {
    expect(SidebarPaginator::getPagger('/not-a-real-page'))->toBe([
        'prev' => null,
        'next' => null,
        'current' => null,
    ]);
});
test('example', function () {
    expect(true)->toBeTrue();
});

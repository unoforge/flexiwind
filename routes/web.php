<?php

use App\Http\Controllers\PreviewUiController;
use App\Livewire\ComponentPage;
use App\Livewire\DocsPage;
use App\Livewire\PagePreview;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home-page')->name('pages.home-page');

Route::redirect('/docs', '/docs/introduction');
Route::redirect('/components', '/components/button');
Route::livewire('/docs/{main?}/{children?}', DocsPage::class)->name('documentation');
Route::livewire('/components/{main?}/{children?}', ComponentPage::class)->name('components');

Route::get('/blocks', function () {
    $blocks = config('blocks');
    $firstBlock = collect($blocks)->keys()->first();
    return redirect("/blocks/{$firstBlock}");
})->name('blocks.index');

Route::livewire('/blocks/{blockName}', 'pages::blocks.group-view')->name('blocks.show');

Route::livewire('/preview-blocks/{group}/{preview}', PagePreview::class)->name('preview.grouped');

Route::get('/preview-ui/{group}/{preview}', PreviewUiController::class)->name('preview.ui');

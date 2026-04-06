<?php

use App\Http\Controllers\PreviewUiController;
use App\Livewire\ComponentPage;
use App\Livewire\DocsPage;
use App\Livewire\PagePreview;
use Illuminate\Support\Facades\Route;

Route::livewire('/', 'pages::home-page')->name('pages.home-page');
Route::livewire('/the-club', 'pages::the-club')->name('pages.the-club');
Route::livewire('/templates', 'pages::templates')->name('pages.templates');

Route::redirect('/docs', '/docs/introduction');
Route::livewire('/docs/{main?}/{children?}', DocsPage::class)->name('documentation');
Route::livewire('/components/{main?}/{children?}', ComponentPage::class)->name('components');

Route::livewire('/blocks', 'pages::blocks.list-page')->name('blocks.list');
Route::livewire('/blocks/{blockCategory}/{blockName}', 'pages::blocks.group-view')->name('blocks.show');
Route::livewire('/preview-blocks/{group}/{preview}', PagePreview::class)->name('preview.grouped');

Route::get('/preview-ui/{group}/{preview}', PreviewUiController::class)->name('preview.ui');

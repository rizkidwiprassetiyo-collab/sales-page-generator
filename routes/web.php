<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\SalesPageForm;
use App\Livewire\SalesPageIndex;
use App\Livewire\SalesPageShow;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/sales-pages', SalesPageIndex::class)->name('sales-pages.index');
    Route::get('/sales-pages/create', SalesPageForm::class)->name('sales-pages.create');
    Route::get('/sales-pages/{id}', SalesPageShow::class)->name('sales-pages.show');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';
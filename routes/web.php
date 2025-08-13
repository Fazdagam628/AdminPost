<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\CerpenController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return redirect('admin/login');
})->name('login');
Route::get('/administrator', function () {
    return redirect('/admin');
});

Route::get('/', [GameController::class, 'index'])->name('games.index');
Route::get('/games', [GameController::class, 'game'])->name('games.game');
Route::get('/games/{game:slug}', [GameController::class, 'show'])->name('games.show');

Route::get('/cerpen', [CerpenController::class, 'index'])->name('cerpen.index');
Route::get('/cerpen/{cerpen:slug}', [CerpenController::class, 'show'])->name('cerpen.show');

Route::get('/assets', [AssetController::class, 'index'])->name('assets.index');
Route::get('/assets/{asset:slug}', [AssetController::class, 'show'])->name('assets.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

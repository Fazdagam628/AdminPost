<?php

use App\Http\Controllers\CerpenController;
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

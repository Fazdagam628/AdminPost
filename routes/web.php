<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return redirect('admin/login');
})->name('login');
Route::get('/administrator', function () {
    return redirect('/admin');
});

Route::resource('games', GameController::class);
Route::get('/', [GameController::class, 'index'])->name('games.index');
Route::get('game', [GameController::class, 'game'])->name('games.game');
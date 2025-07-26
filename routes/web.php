<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\NewsController as PublicNewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('news', AdminNewsController::class)->except(['show']);
});

Route::get('/news', [PublicNewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [PublicNewsController::class, 'show'])->name('news.show');

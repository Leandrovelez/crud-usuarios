<?php

use App\Http\Controllers\Usuario\UsuarioRepositoryController;
use App\Http\Controllers\Usuario\UsuarioViewerController;
use Illuminate\Support\Facades\Route;

Route::controller(UsuarioRepositoryController::class)->name('usuarios.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/store', 'store')->name('store');
    Route::put('/update/{id}', 'update')->name('update');
    Route::get('/delete/{id}', 'delete')->name('delete');
});

Route::controller(UsuarioViewerController::class)->name('usuarios.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::get('/edit/{id}', 'edit')->name('edit');
});


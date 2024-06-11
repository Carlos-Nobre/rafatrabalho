<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*Rotas de Cadastro*/
Route::get('index',[UserController::class, 'index'])->name('index');
Route::get('user/register' , [UserController::class, 'register']) -> name('user.register');
Route::post('user',[UserController::class, 'store'])->name('user.store');
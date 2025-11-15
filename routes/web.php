<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\loginController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/beranda', [BerandaController::class, 'index']);
    Route::get('/user', [BerandaController::class, 'user'])->name('user');
    Route::get('/role-user', [BerandaController::class, 'roleUser'])->name('role-user');
});

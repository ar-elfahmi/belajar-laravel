<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\loginController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;


// penamaan untuk routing path dengan get menggunakan huruf kecil di setiap katanya di sambung menggunakan dash contoh: /role-user untuk name nya / diawal dihilangkan menjadi role-user
// penamaan fungsi dalam Http/Controler diawali dengan huruf kecil dan kata Selanjutnya diawali Huruf besar contoh: roleUser dalam contoller BerandaController
// penamaan Controller dan Middleware mengunakan huruf besar diawal setiap kata dan di sambung

Route::get('/', function () {
    return view('welcome');
}); //halaman landing page sebelum login
Route::get('/login', function () {
    return view('Pengguna.login');
})->name('login'); //halaman login
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin'); // logika untuk cek login apakah benar
Route::get('/logout', [LoginController::class, 'logout'])->name('logout'); //logika untuk logout

Route::group(['middleware' => ['auth', 'cekrole:Admin']], function () {
    //Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda'); // halaman dashboard tiap role beda admin, resepsionis, dokter, perawat, pemilik
    Route::get('/user', [BerandaController::class, 'user'])->name('user'); // halaman data master user
    Route::get('/role-user', [BerandaController::class, 'roleUser'])->name('role-user'); // halaman data master role user khusus admin
    //Route::get('/temu-dokter', [BerandaController::class, 'temuDokter'])->name('temu-dokter'); // halaman temu dokter khusus resepsionis
});

Route::group(['middleware' => ['auth', 'cekrole:Admin,Resepsionis']], function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda'); // halaman dashboard tiap role beda admin, resepsionis, dokter, perawat, pemilik
    Route::get('/temu-dokter', [BerandaController::class, 'temuDokter'])->name('temu-dokter'); // halaman temu dokter khusus resepsionis
});

<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriKlinisController;
use App\Http\Controllers\KodeTindakanTerapiController;
use App\Http\Controllers\RasHewanController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\TemuDokterController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\DetailRekamMedisController;
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


// middleware bersama untuk role resepsionis, administrator, pemilik, dokter, perawat (halaman depan)
Route::group(['middleware' => ['auth', 'cekrole:Resepsionis,Administrator,Pemilik,Dokter,Perawat']], function () {
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda'); // halaman dashboard tiap role beda
});

// middleware bersama untuk role resepsionis, administrator, pemilik, dokter, perawat (halaman depan)
Route::group(['middleware' => ['auth', 'cekrole:Resepsionis,Administrator,Pemilik,Dokter,Perawat']], function () {
    Route::get('/profile', [BerandaController::class, 'profile'])->name('profile'); // halaman dashboard tiap role beda
});


// middleware khusus untuk role administrator - CRUD semua master dan transaksional
Route::prefix('admin')
    ->middleware('cekrole:Administrator')
    ->name('admin.')
    ->group(function () {
        // Data Master
        Route::get('/user', [UserController::class, 'user'])->name('user'); // halaman data master user
        Route::get('/user/tambah-user', [UserController::class, 'tambahUser'])->name('tambah-user'); // halaman tambah user
        Route::get('/user/edit-user/{iduser}', [UserController::class, 'editUser'])->name('edit-user'); // halaman edit user
        Route::post('/user/store', [UserController::class, 'store'])->name('user.store'); // function untuk tambah data user
        Route::put('/user/update/{iduser}', [UserController::class, 'update'])->name('user.update'); // function untuk edit data user
        Route::get('/user/hapus/{iduser}', [UserController::class, 'destroy'])->name('user.hapus'); // function untuk hapus data user

        Route::get('/role-user', [RoleUserController::class, 'roleUser'])->name('role-user'); // halaman data master role user
        Route::get('/role-user/tambah-role-user', [RoleUserController::class, 'tambahRoleUser'])->name('tambah-role-user'); // halaman tambah role user
        Route::get('/role-user/edit-role-user/{idrole_user}', [RoleUserController::class, 'editRoleUser'])->name('edit-role-user'); // halaman edit role user
        Route::post('/role-user/store', [RoleUserController::class, 'store'])->name('role-user.store'); // function untuk tambah data role user
        Route::put('/role-user/update/{idrole_user}', [RoleUserController::class, 'update'])->name('role-user.update'); // function untuk edit data role user
        Route::get('/role-user/hapus/{idrole_user}', [RoleUserController::class, 'destroy'])->name('role-user.hapus'); // function untuk hapus data role user

        Route::get('/jenis-hewan', [JenisHewanController::class, 'jenisHewan'])->name('jenis-hewan'); // halaman data master jenis hewan
        Route::get('/jenis-hewan/tambah-jenis-hewan', [JenisHewanController::class, 'tambahJenisHewan'])->name('tambah-jenis-hewan'); // halaman tambah jenis hewan
        Route::get('/jenis-hewan/edit-jenis-hewan/{idjenis_hewan}', [JenisHewanController::class, 'editJenisHewan'])->name('edit-jenis-hewan'); // halaman edit jenis hewan
        Route::post('/jenis-hewan/store', [JenisHewanController::class, 'store'])->name('jenis-hewan.store'); // untuk tambah data jenis hewan
        Route::put('/jenis-hewan/update/{idjenis_hewan}', [JenisHewanController::class, 'update'])->name('jenis-hewan.update'); // untuk edit data jenis hewan
        Route::get('/jenis-hewan/hapus/{idjenis_hewan}', [JenisHewanController::class, 'destroy'])->name('jenis-hewan.hapus'); // untuk hapus data jenis hewan

        Route::get('/kategori', [KategoriController::class, 'kategori'])->name('kategori'); // halaman data master kategori
        Route::get('/kategori/tambah-kategori', [KategoriController::class, 'tambahKategori'])->name('tambah-kategori'); // halaman tambah kategori
        Route::get('/kategori/edit-kategori/{idkategori}', [KategoriController::class, 'editKategori'])->name('edit-kategori'); // halaman edit kategori
        Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store'); // untuk tambah data kategori
        Route::put('/kategori/update/{idkategori}', [KategoriController::class, 'update'])->name('kategori.update'); // untuk edit data kategori
        Route::get('/kategori/hapus/{idkategori}', [KategoriController::class, 'destroy'])->name('kategori.hapus'); // untuk hapus data kategori

        Route::get('/kategori-klinis', [KategoriKlinisController::class, 'kategoriKlinis'])->name('kategori-klinis'); // halaman data master kategori klinis
        Route::get('/kategori-klinis/tambah-kategori-klinis', [KategoriKlinisController::class, 'tambahKategoriKlinis'])->name('tambah-kategori-klinis'); // halaman tambah kategori klinis
        Route::get('/kategori-klinis/edit-kategori-klinis/{idkategori_klinis}', [KategoriKlinisController::class, 'editKategoriKlinis'])->name('edit-kategori-klinis'); // halaman edit kategori klinis
        Route::post('/kategori-klinis/store', [KategoriKlinisController::class, 'store'])->name('kategori-klinis.store'); // untuk tambah data kategori klinis
        Route::put('/kategori-klinis/update/{idkategori_klinis}', [KategoriKlinisController::class, 'update'])->name('kategori-klinis.update'); // untuk edit data kategori klinis
        Route::get('/kategori-klinis/hapus/{idkategori_klinis}', [KategoriKlinisController::class, 'destroy'])->name('kategori-klinis.hapus'); // untuk hapus data kategori klinis

        Route::get('/kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'kodeTindakanTerapi'])->name('kode-tindakan-terapi'); // halaman data master kode tindakan terapi
        Route::get('/kode-tindakan-terapi/tambah-kode-tindakan-terapi', [KodeTindakanTerapiController::class, 'tambahKodeTindakanTerapi'])->name('tambah-kode-tindakan-terapi'); // halaman tambah kode tindakan terapi
        Route::get('/kode-tindakan-terapi/edit-kode-tindakan-terapi/{idkode_tindakan_terapi}', [KodeTindakanTerapiController::class, 'editKodeTindakanTerapi'])->name('edit-kode-tindakan-terapi'); // halaman edit kode tindakan terapi
        Route::post('/kode-tindakan-terapi/store', [KodeTindakanTerapiController::class, 'store'])->name('kode-tindakan-terapi.store'); // untuk tambah data kode tindakan terapi
        Route::put('/kode-tindakan-terapi/update/{idkode_tindakan_terapi}', [KodeTindakanTerapiController::class, 'update'])->name('kode-tindakan-terapi.update'); // untuk edit data kode tindakan terapi
        Route::get('/kode-tindakan-terapi/hapus/{idkode_tindakan_terapi}', [KodeTindakanTerapiController::class, 'destroy'])->name('kode-tindakan-terapi.hapus'); // untuk hapus data kode tindakan terapi

        Route::get('/ras-hewan', [RasHewanController::class, 'rasHewan'])->name('ras-hewan'); // halaman data master ras hewan
        Route::get('/ras-hewan/tambah-ras-hewan', [RasHewanController::class, 'tambahRasHewan'])->name('tambah-ras-hewan'); // halaman tambah ras hewan
        Route::get('/ras-hewan/edit-ras-hewan/{idras_hewan}', [RasHewanController::class, 'editRasHewan'])->name('edit-ras-hewan'); // halaman edit ras hewan
        Route::post('/ras-hewan/store', [RasHewanController::class, 'store'])->name('ras-hewan.store'); // untuk tambah data ras hewan
        Route::put('/ras-hewan/update/{idras_hewan}', [RasHewanController::class, 'update'])->name('ras-hewan.update'); // untuk edit data ras hewan
        Route::get('/ras-hewan/hapus/{idras_hewan}', [RasHewanController::class, 'destroy'])->name('ras-hewan.hapus'); // untuk hapus data ras hewan

        Route::get('/role', [RoleController::class, 'role'])->name('role'); // halaman data master role
        Route::get('/role/tambah-role', [RoleController::class, 'tambahRole'])->name('tambah-role'); // halaman tambah role
        Route::get('/role/edit-role/{idrole}', [RoleController::class, 'editRole'])->name('edit-role'); // halaman edit role
        Route::post('/role/store', [RoleController::class, 'store'])->name('role.store'); // untuk tambah data role
        Route::put('/role/update/{idrole}', [RoleController::class, 'update'])->name('role.update'); // untuk edit data role
        Route::get('/role/hapus/{idrole}', [RoleController::class, 'destroy'])->name('role.hapus'); // untuk hapus data role

        // Data Transaksional
        Route::get('/pemilik', [PemilikController::class, 'pemilik'])->name('pemilik'); // halaman data master pemilik
        Route::get('/pemilik/tambah-pemilik', [PemilikController::class, 'tambahPemilik'])->name('tambah-pemilik'); // halaman tambah pemilik
        Route::get('/pemilik/edit-pemilik/{idpemilik}', [PemilikController::class, 'editPemilik'])->name('edit-pemilik'); // halaman edit pemilik
        Route::post('/pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store'); // untuk tambah data pemilik
        Route::put('/pemilik/update/{idpemilik}', [PemilikController::class, 'update'])->name('pemilik.update'); // untuk edit data pemilik
        Route::get('/pemilik/hapus/{idpemilik}', [PemilikController::class, 'destroy'])->name('pemilik.hapus'); // untuk hapus data pemilik

        Route::get('/pet', [PetController::class, 'pet'])->name('pet'); // halaman data master pet
        Route::get('/pet/tambah-pet', [PetController::class, 'tambahPet'])->name('tambah-pet'); // halaman tambah pet
        Route::get('/pet/edit-pet/{idpet}', [PetController::class, 'editPet'])->name('edit-pet'); // halaman edit pet
        Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store'); // untuk tambah data pet
        Route::put('/pet/update/{idpet}', [PetController::class, 'update'])->name('pet.update'); // untuk edit data pet
        Route::get('/pet/hapus/{idpet}', [PetController::class, 'destroy'])->name('pet.hapus'); // untuk hapus data pet

        Route::get('/temu-dokter', [TemuDokterController::class, 'temu_dokter'])->name('temu-dokter'); // halaman data master temu dokter
        Route::get('/temu-dokter/tambah-temu-dokter', [TemuDokterController::class, 'tambahTemuDokter'])->name('tambah-temu-dokter'); // halaman tambah temu dokter
        Route::get('/temu-dokter/edit-temu-dokter/{idreservasi_dokter}', [TemuDokterController::class, 'editTemuDokter'])->name('edit-temu-dokter'); // halaman edit temu dokter
        Route::post('/temu-dokter/store', [TemuDokterController::class, 'store'])->name('temu-dokter.store'); // untuk tambah data temu dokter
        Route::put('/temu-dokter/update/{idreservasi_dokter}', [TemuDokterController::class, 'update'])->name('temu-dokter.update'); // untuk edit data temu dokter
        Route::get('/temu-dokter/hapus/{idreservasi_dokter}', [TemuDokterController::class, 'destroy'])->name('temu-dokter.hapus'); // untuk hapus data temu dokter

        Route::get('/rekam-medis', [RekamMedisController::class, 'rekam_medis'])->name('rekam-medis'); // halaman data master rekam medis
        Route::get('/rekam-medis/tambah-rekam-medis', [RekamMedisController::class, 'tambahRekamMedis'])->name('tambah-rekam-medis'); // halaman tambah rekam medis
        Route::get('/rekam-medis/edit-rekam-medis/{idrekam_medis}', [RekamMedisController::class, 'editRekamMedis'])->name('edit-rekam-medis'); // halaman edit rekam medis
        Route::post('/rekam-medis/store', [RekamMedisController::class, 'store'])->name('rekam-medis.store'); // untuk tambah data rekam medis
        Route::put('/rekam-medis/update/{idrekam_medis}', [RekamMedisController::class, 'update'])->name('rekam-medis.update'); // untuk edit data rekam medis
        Route::get('/rekam-medis/hapus/{idrekam_medis}', [RekamMedisController::class, 'destroy'])->name('rekam-medis.hapus'); // untuk hapus data rekam medis

        Route::get('/detail-rekam-medis', [DetailRekamMedisController::class, 'detail_rekam_medis'])->name('detail-rekam-medis'); // halaman data master detail rekam medis
        Route::get('/detail-rekam-medis/tambah-detail-rekam-medis', [DetailRekamMedisController::class, 'tambahDetailRekamMedis'])->name('tambah-detail-rekam-medis'); // halaman tambah detail rekam medis
        Route::get('/detail-rekam-medis/edit-detail-rekam-medis/{iddetail_rekam_medis}', [DetailRekamMedisController::class, 'editDetailRekamMedis'])->name('edit-detail-rekam-medis'); // halaman edit detail rekam medis
        Route::post('/detail-rekam-medis/store', [DetailRekamMedisController::class, 'store'])->name('detail-rekam-medis.store'); // untuk tambah data detail rekam medis
        Route::put('/detail-rekam-medis/update/{iddetail_rekam_medis}', [DetailRekamMedisController::class, 'update'])->name('detail-rekam-medis.update'); // untuk edit data detail rekam medis
        Route::get('/detail-rekam-medis/hapus/{iddetail_rekam_medis}', [DetailRekamMedisController::class, 'destroy'])->name('detail-rekam-medis.hapus'); // untuk hapus data detail rekam medis
    });

// middleware khusus untuk role resepsionis - CRUD pet dan pemilik, CRUD temu dokter
Route::prefix('resepsionis')
    ->middleware('cekrole:Resepsionis')
    ->name('resepsionis.')
    ->group(function () {
        Route::get('/pemilik', [PemilikController::class, 'pemilik'])->name('pemilik'); // halaman data master pemilik
        Route::get('/pemilik/tambah-pemilik', [PemilikController::class, 'tambahPemilik'])->name('tambah-pemilik'); // halaman tambah pemilik
        Route::get('/pemilik/edit-pemilik/{idpemilik}', [PemilikController::class, 'editPemilik'])->name('edit-pemilik'); // halaman edit pemilik
        Route::post('/pemilik/store', [PemilikController::class, 'store'])->name('pemilik.store'); // untuk tambah data pemilik
        Route::put('/pemilik/update/{idpemilik}', [PemilikController::class, 'update'])->name('pemilik.update'); // untuk edit data pemilik
        Route::get('/pemilik/hapus/{idpemilik}', [PemilikController::class, 'destroy'])->name('pemilik.hapus'); // untuk hapus data pemilik

        Route::get('/pet', [PetController::class, 'pet'])->name('pet'); // halaman data master pet
        Route::get('/pet/tambah-pet', [PetController::class, 'tambahPet'])->name('tambah-pet'); // halaman tambah pet
        Route::get('/resepsionis/pet/edit-pet/{idpet}', [PetController::class, 'editPet'])->name('edit-pet'); // halaman edit pet
        Route::post('/pet/store', [PetController::class, 'store'])->name('pet.store'); // untuk tambah data pet
        Route::put('/pet/update/{idpet}', [PetController::class, 'update'])->name('pet.update'); // untuk edit data pet
        Route::get('/pet/hapus/{idpet}', [PetController::class, 'destroy'])->name('pet.hapus'); // untuk hapus data pet

        Route::get('/temu-dokter', [TemuDokterController::class, 'temu_dokter'])->name('temu-dokter'); // halaman data master temu dokter
        Route::get('/temu-dokter/tambah-temu-dokter', [TemuDokterController::class, 'tambahTemuDokter'])->name('tambah-temu-dokter'); // halaman tambah temu dokter
        Route::get('/temu-dokter/edit-temu-dokter/{idreservasi_dokter}', [TemuDokterController::class, 'editTemuDokter'])->name('edit-temu-dokter'); // halaman edit temu dokter
        Route::post('/temu-dokter/store', [TemuDokterController::class, 'store'])->name('temu-dokter.store'); // untuk tambah data temu dokter
        Route::put('/temu-dokter/update/{idreservasi_dokter}', [TemuDokterController::class, 'update'])->name('temu-dokter.update'); // untuk edit data temu dokter
        Route::get('/emu-dokter/hapus/{idreservasi_dokter}', [TemuDokterController::class, 'destroy'])->name('temu-dokter.hapus'); // untuk hapus data temu dokter

    });

// middleware khusus untuk role perawat - view data pasien, CRUD rekam medis, view detail rekam medis, view profil
Route::prefix('perawat')
    ->middleware('cekrole:Perawat')
    ->name('perawat.')
    ->group(function () {
        Route::get('/pet', [PetController::class, 'pet'])->name('pet'); // halaman data master pet
        Route::get('/pemilik', [PemilikController::class, 'pemilik'])->name('pemilik'); // halaman data master pemilik
        // Route::get('/data-pasien', [BerandaController::class, 'dataPasien'])->name('data-pasien'); // view data pasien
        Route::get('/rekam-medis', [RekamMedisController::class, 'rekam_medis'])->name('rekam-medis'); // view rekam medis
        Route::get('/rekam-medis/tambah-rekam-medis', [RekamMedisController::class, 'tambahRekamMedis'])->name('tambah-rekam-medis'); // halaman tambah rekam medis
        Route::get('/rekam-medis/edit-rekam-medis/{idrekam_medis}', [RekamMedisController::class, 'editRekamMedis'])->name('edit-rekam-medis'); // halaman edit rekam medis
        Route::post('/rekam-medis/store', [RekamMedisController::class, 'store'])->name('rekam-medis.store'); // untuk tambah data rekam medis
        Route::put('/rekam-medis/update/{idrekam_medis}', [RekamMedisController::class, 'update'])->name('rekam-medis.update'); // untuk edit data rekam medis
        Route::get('/rekam-medis/hapus/{idrekam_medis}', [RekamMedisController::class, 'destroy'])->name('rekam-medis.hapus'); // untuk hapus data rekam medis
        Route::get('/detail-rekam-medis', [DetailRekamMedisController::class, 'detail_rekam_medis'])->name('detail-rekam-medis'); // view detail rekam medis
        // Route::get('/profil', [BerandaController::class, 'profilPerawat'])->name('profil'); // view profil perawat
    });


// middleware khusus untuk role dokter - view data pasien, view rekam medis, CRUD detail rekam medis, view profil
Route::prefix('dokter')
    ->middleware('cekrole:Dokter')
    ->name('dokter.')
    ->group(function () {
        Route::get('/pet', [PetController::class, 'pet'])->name('pet'); // halaman data master pet
        Route::get('/pemilik', [PemilikController::class, 'pemilik'])->name('pemilik'); // halaman data master pemilik
        // Route::get('/data-pasien', [BerandaController::class, 'dataPasien'])->name('data-pasien'); // view data pasien
        Route::get('/rekam-medis', [RekamMedisController::class, 'rekam_medis'])->name('rekam-medis'); // view rekam medis
        Route::get('/detail-rekam-medis', [DetailRekamMedisController::class, 'detail_rekam_medis'])->name('detail-rekam-medis'); // view detail rekam medis
        Route::get('/detail-rekam-medis/tambah-detail-rekam-medis', [DetailRekamMedisController::class, 'tambahDetailRekamMedis'])->name('tambah-detail-rekam-medis'); // halaman tambah detail rekam medis
        Route::get('/detail-rekam-medis/edit-detail-rekam-medis/{iddetail_rekam_medis}', [DetailRekamMedisController::class, 'editDetailRekamMedis'])->name('edit-detail-rekam-medis'); // halaman edit detail rekam medis
        Route::post('/detail-rekam-medis/store', [DetailRekamMedisController::class, 'store'])->name('detail-rekam-medis.store'); // untuk tambah data detail rekam medis
        Route::put('/detail-rekam-medis/update/{iddetail_rekam_medis}', [DetailRekamMedisController::class, 'update'])->name('detail-rekam-medis.update'); // untuk edit data detail rekam medis
        Route::get('/detail-rekam-medis/hapus/{iddetail_rekam_medis}', [DetailRekamMedisController::class, 'destroy'])->name('detail-rekam-medis.hapus'); // untuk hapus data detail rekam medis
        // Route::get('/profil', [BerandaController::class, 'profilDokter'])->name('profil'); // view profil dokter
    });


// middleware khusus untuk role pemilik - view jadwal temu dokter, view rekam medis, view profil dan pet
Route::prefix('pemilik')
    ->middleware('cekrole:Pemilik')
    ->name('pemilik.')
    ->group(function () {
        Route::get('/jadwal-temu-dokter', [TemuDokterController::class, 'temu_dokter'])->name('jadwal-temu-dokter'); // view jadwal temu dokter
        Route::get('/rekam-medis', [RekamMedisController::class, 'rekam_medis'])->name('rekam-medis'); // view rekam medis
        // Route::get('/profil', [BerandaController::class, 'profilPemilik'])->name('profil'); // view profil pemilik
        Route::get('/pet', [PetController::class, 'pet'])->name('pet'); // view pet
    });

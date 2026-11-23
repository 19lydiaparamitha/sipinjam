<?php
use App\Http\Controllers\AlatController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// route baru: mengembalikan teks
Route::get('/halo', function () {
    return 'Halo, Laravel!';
});

// route dengan parameter
Route::get('/halo/{nama}', function ($nama) {
    return 'Halo, ' . $nama . '!';
});

Route::get('/coba', function () {
    return view('coba');
});

Route::resource('alat', AlatController::class);
Route::resource('buku', BukuController::class);
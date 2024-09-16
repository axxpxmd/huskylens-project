<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Controller
use App\Http\Controllers\HuskylensController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// API
Route::group(['prefix' => '/api'], function() {
    Route::get('/', function () {
        return ('Selamat Datang di API Huskylens');
    });

    Route::post('/data-huskylens', [HuskylensController::class, 'getDataFromHuskylens']);
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/get-data', [HomeController::class, 'getIdData'])->name('getIdData');
Route::get('/form-quesioner', [HomeController::class, 'formQuesioner'])->name('formQuesioner');
Route::post('/submit-form', [HomeController::class, 'submitForm'])->name('submitForm');
Route::post('/get-result', [HomeController::class, 'getResult'])->name('getResult');
Route::get('/print-report/{patient_id}', [HomeController::class, 'printReport'])->name('printReport');
Route::get('/kota-by-provinsi/{provinsi_id}', [HomeController::class, 'getKotaByProvinsi'])->name('getKotaByProvinsi');
Route::get('/kecamatan-by-kota/{kota_id}', [HomeController::class, 'getKecamatanByKota'])->name('getKecamatanByKota');
Route::get('/send-email/{patient_id}', [HomeController::class, 'sendEmail'])->name('sendEmail');

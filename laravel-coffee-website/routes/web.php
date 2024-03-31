<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KopiController;
use App\Http\Controllers\RasaKopiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', [KopiController::class, 'index']);

//ADMIN
Route::get('/admin-dashboard', [KopiController::class, 'dashboard']);
Route::get('/admin-datakopi', [KopiController::class, 'datakopiadmin']);
Route::get('/admin-datakopi-add', function () {
    return view('admin/datakopi/add');
});
Route::get('/admin-keuangan', function () {
    return view('admin/keuangan/index');
});
Route::get('/admin-listrasakopi', [RasaKopiController::class, 'index']);
Route::get('/admin-addrasakopi', function () {
    return view('admin/rasakopi/add_rasa');
});
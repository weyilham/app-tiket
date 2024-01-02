<?php

use App\Models\Tiket;
use GuzzleHttp\Psr7\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard/index');
});

// Route::get('/getTiket', function (Request $request) {
//     $data = Tiket::all();
//     return 
// });
Route::get('/tiket', function () {
    return view('master.tiket.index', [
        'title' => 'Data Tiket'
    ]);
});
Route::resource('/getTiket', TiketController::class);

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');

//cart
Route::post('/cart', [CartController::class, 'addCart'])->name('cart');

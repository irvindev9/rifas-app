<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\LotteryController;

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
/*
Route::get('/', function () {
    return view('home.index');
});
*/
Route::get('/', [LotteryController::class, 'index']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('aviso/{notice}', [NoticeController::class, 'show'])->name('notice');

Route::view('comprar/rifa/{contest}', 'buy-ticket.index');

Route::view('ticket/{lottery}/{ticket}', 'ticket-buyed.index');

require __DIR__.'/auth.php';

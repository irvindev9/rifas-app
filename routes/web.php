<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LotteryController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\TicketBuyedController;
use App\Http\Controllers\SettingControler;


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
Route::get('/', [LandingController::class, 'index']);


Route::get('/rifas', [LotteryController::class, 'index'])->middleware(['auth'])->name('dashboard');


Route::get('/premios/{lottery}', [PrizeController::class, 'index'])->middleware(['auth'])->name('prizes');


Route::get('/boletos/{lottery}', [TicketBuyedController::class, 'index'])->middleware(['auth'])->name('ticketsBuyed');


Route::get('/ajustes', [SettingControler::class, 'index'])->middleware(['auth'])->name('settings');




Route::get('aviso/{notice}', [NoticeController::class, 'show'])->name('notice');

Route::view('comprar/rifa/{contest}', 'buy-ticket.index');

Route::view('ticket/{lottery}/{ticket}', 'ticket-buyed.index');

require __DIR__.'/auth.php';

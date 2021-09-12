<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LotteryController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\TicketBuyedController;
use App\Http\Controllers\SettingController;


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
Route::get('/next', [LandingController::class, 'next']);

Route::get('/rifas', [LotteryController::class, 'index'])->name('dashboard');
Route::get('/crearRifa', [LotteryController::class, 'create'])->name('lotteries.create');
Route::post('/guardarRifa', [LotteryController::class, 'store'])->name('lotteries.store');
Route::get('/editarRifa/{lottery}', [LotteryController::class, 'edit'])->name('lotteries.edit');
Route::post('/actualizarRifa/{lottery}', [LotteryController::class, 'update'])->name('lotteries.update');
Route::post('/eliminarRifa/{lottery}', [LotteryController::class, 'destroy'])->name('lotteries.delete');

Route::get('/premios/{lottery}', [PrizeController::class, 'index'])->name('prizes.index');
Route::get('/crearPremio/{lottery}', [PrizeController::class, 'create'])->name('prizes.create');
Route::post('/guardarPremio/{lottery}', [PrizeController::class, 'store'])->name('prizes.store');
Route::get('/editarPremio/{prize}', [PrizeController::class, 'edit'])->name('prizes.edit');
Route::post('/actualizarPremio/{prize}', [PrizeController::class, 'update'])->name('prizes.update');
Route::post('/eliminarPremio/{prize}', [PrizeController::class, 'destroy'])->name('prizes.delete');

Route::get('/boletos/{lottery}', [TicketBuyedController::class, 'index'])->name('ticketsBuyed.index');
Route::get('/boletos/{id}/delete', [TicketBuyedController::class, 'deleteAll'])->name('ticketsBuyed.delete');
Route::get('/editarCompra/{ticketBuyed}', [TicketBuyedController::class, 'edit'])->name('ticketsBuyed.edit');
Route::post('/actualizarCompra/{ticketBuyed}', [TicketBuyedController::class, 'update'])->name('ticketsBuyed.update');
Route::post('/eliminarCompra/{ticketBuyed}', [TicketBuyedController::class, 'destroy'])->name('ticketsBuyed.delete');

Route::get('/ajustes', [SettingController::class, 'index'])->name('settings.index');
Route::get('/crearAjuste', [SettingController::class, 'create'])->name('settings.create');
Route::post('/guardarAjuste', [SettingController::class, 'store'])->name('settings.store');
Route::get('/editarAjuste/{setting}', [SettingController::class, 'edit'])->name('settings.edit');
Route::post('/actualizarAjuste/{setting}', [SettingController::class, 'update'])->name('settings.update');
Route::post('/eliminarAjuste/{setting}', [SettingController::class, 'destroy'])->name('settings.delete');


Route::get('aviso/{notice}', [NoticeController::class, 'show'])->name('notice');
Route::get('bases/{notice}', [NoticeController::class, 'show_lottery'])->name('notice.lottery');

Route::get('comprar/rifa/{contest}/verificador', [LandingController::class, 'verificator'])->name('verificator');
Route::post('comprar/rifa/{contest}/verificador', [LandingController::class, 'show'])->name('verificator.show');

// Route::get('comprar/rifa/{contest}/generar-boleto', [TicketBuyedController::class, 'generator'])->name('generator');
Route::get('comprar/rifa/{contest}/generar-boleto', [TicketBuyedController::class, 'getTicket'])->name('generator.show');


Route::get('sorteo/{contest}', [LandingController::class, 'buy_ticket'])->name('contest.lotto');

// Route::view('ticket/{lottery}/{ticket}', 'ticket-buyed.index');
Route::get('ticket/random/{id}', [LandingController::class, 'generate_other_tickets']);
Route::get('ticket/{lottery}/{ticket}', [LandingController::class, 'buy_ticket_form'])->name('contest.lotto.ticket');
Route::post('save/ticket', [LandingController::class, 'save_ticket']);

Route::post('/get_ticket_buyed', [LandingController::class, 'buyed_tickets']);

require __DIR__.'/auth.php';

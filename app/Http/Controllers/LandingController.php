<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
    public function index()
    {
        $lottery = DB::table('lotteries')
                    ->select('name', 'quantity_tickets', 'price_ticket', 'lastday_lottery')
                    ->where('active', 1)->first();
        $lotteryId = DB::table('lotteries')->where('active', 1)->value('id');


        $prizes = DB::table('prizes')
                    ->select('prize', 'date_lottery_prize')
                    ->where('lottery_id', $lotteryId)
                    ->get();

        $ticketsBuyed = DB::table('ticket_buyeds')
                    ->select('ticket')
                    ->where('lottery_id', $lotteryId)
                    ->get();

        //dd($lottery);

        return view('home.index', ['lottery' => $lottery, 'prizes', $prizes, 'ticketsBuyed', $ticketsBuyed]);

    }
}

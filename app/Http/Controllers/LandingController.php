<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use App\Models\TicketBuyed;
use App\Models\OtherTicketBuyed;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function active(){
        $lottery = Lottery::with(['prizes','ticketsBuyed'])
            ->where('active', 1)
            ->get()
            ->toJson();

        return response($lottery);
    }

    public function next() {
        $lottery = Lottery::where('active', 1)->first();

        if (isset($lottery)) {
            return redirect()->route('contest.lotto', $lottery->id);
        } else {
            return redirect('/');
        }


    }

    public function buy_ticket($lottery){
        $lottery = Lottery::with(['prizes'])->where('active', 1)->where('id', $lottery)->first();

        return view('buy-ticket.index')->with(compact(['lottery']));
    }

    public function show($contest, Request $request)
    {
        $ticketBuyed = TicketBuyed::with(['otherTicketsBuyed'])->where('lottery_id', $contest)->where('ticket', $request['ticket'])->first();

        if(!isset($ticketBuyed)){
            $idTicketBuyed = OtherTicketBuyed::select('ticket_buyed_id')->where('lottery_id', $contest)->where('ticket', $request['ticket'])->first();
            if(isset($idTicketBuyed)){
                $ticketBuyed = TicketBuyed::with(['otherTicketsBuyed'])->where('lottery_id', $contest)->where('ticket', $idTicketBuyed->ticket_buyed_id)->first();
            }
        }

        $lottery = Lottery::find($contest);

        return view('buy-ticket.verificator', ['lottery' => $lottery, "showTableVerificator" => true, "ticketBuyed" => $ticketBuyed]);
    }

    public function verificator($contest)
    {
        $lottery = Lottery::find($contest);

        return view('buy-ticket.verificator', ['lottery' => $lottery, "showTableVerificator" => false, "ticketBuyed" => new TicketBuyed]);
    }
}

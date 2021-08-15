<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
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
}

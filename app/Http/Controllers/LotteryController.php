<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

        // dd($ticketsBuyed);

        return view('home.index', ['lottery' => $lottery, 'prizes', $prizes, 'ticketsBuyed', $ticketsBuyed]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lottery = new Lottery;

        $validated = $request->validate([
            'name' => 'required',
            'quantity_tickets' => 'required|numeric',
            'price_ticket' => 'required|',

        ]);

        $lottery->name = $validated->name;
        $lottery->quantity_tickets = $validated->quantity_tickets;
        $lottery->price_ticket = $validated->price_ticket;
        $lottery->lastday_lottery = $validated->lastday_lottery;

        $lottery->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

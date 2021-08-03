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
        //$lottery = Lottery::select('id', 'name', 'quantity_tickets', 'price_ticket', 'lastday_lottery')->get();
        $lotteries = Lottery::paginate();

        //dd($lottery);

        return view('panel-admin.lotteries.index', ['lotteries' => $lotteries]);

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

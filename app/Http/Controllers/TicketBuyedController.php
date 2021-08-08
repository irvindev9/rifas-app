<?php

namespace App\Http\Controllers;

use App\Models\TicketBuyed;
use App\Models\Lottery;
use Illuminate\Http\Request;

class TicketBuyedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lottery $lottery)
    {
        $ticketsBuyed = TicketBuyed::where('lottery_id', $lottery->id)->get();

        return view('panel-admin.tickets-buyed.index', ['ticketsBuyed' => $ticketsBuyed, 'lottery' => $lottery]);
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
        /*$ticketBuyed = new TicketBuyed;

        $validated = $request->validate([
            'ticket' => 'required|numeric',
            'name' => 'required',
            'lastname' => 'required',
            'whats' => 'required',
        ]);

        $ticketBuyed->ticket = $validated['ticket'];
        $ticketBuyed->name_client = $validated['name'];
        $ticketBuyed->lastname_client = $validated['lastname'];
        $ticketBuyed->whats_number = $validated['whats'];
        $ticketBuyed->state = $request['state'];
        $ticketBuyed->paid = isset($request['paid']) ? 1 : 0;

        $ticketBuyed->save();

        return redirect()->route('')->with('status','Se ha actualizado la compra');*/
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
    public function edit(TicketBuyed $ticketBuyed)
    {
        //dd($ticketBuyed);
        $lottery = Lottery::find($ticketBuyed->lottery_id);

        return view('panel-admin.tickets-buyed.edit', ['ticketBuyed' => $ticketBuyed,'lottery' => $lottery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketBuyed $ticketBuyed)
    {
        $validated = $request->validate([
            'ticket' => 'required|numeric',
            'name' => 'required',
            'lastname' => 'required',
            'whats' => 'required',
        ]);

        $ticketBuyed->ticket = $validated['ticket'];
        $ticketBuyed->name_client = $validated['name'];
        $ticketBuyed->lastname_client = $validated['lastname'];
        $ticketBuyed->whats_number = $validated['whats'];
        $ticketBuyed->state = $request['state'];
        $ticketBuyed->paid = isset($request['paid']) ? 1 : 0;

        $ticketBuyed->save();

        $lottery = Lottery::find($ticketBuyed->lottery_id);

        return redirect()->route('ticketsBuyed.index', $lottery)->with('status','Se ha actualizado la compra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketBuyed $ticketBuyed)
    {
        $ticketBuyed->delete();

        $lottery = Lottery::find($ticketBuyed->lottery_id);

        return redirect()->route('ticketsBuyed.index', $lottery)->with('status','El premio se ha eleminado correctamente');
    }
}

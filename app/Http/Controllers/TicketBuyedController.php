<?php

namespace App\Http\Controllers;

use App\Models\TicketBuyed;
use App\Models\OtherTicketBuyed;
use App\Models\Lottery;
use Illuminate\Http\Request;

class TicketBuyedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['verificator','show','generator','getTicket']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Lottery $lottery)
    {
        $ticketsBuyed = TicketBuyed::with(['otherTicketsBuyed'])->where('lottery_id', $lottery->id)->get();

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
        $ticketBuyed->lastname_M_client = $request['lastnameM'];
        $ticketBuyed->whats_number = $validated['whats'];
        $ticketBuyed->state = $request['state'];
        $ticketBuyed->date_buyed = $request['date_buyed'] ? date("Y-m-d H:i:s",strtotime($request['date_buyed'])) : null;
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

        OtherTicketBuyed::where('ticket_buyed_id', $ticketBuyed->id)->delete();
        $ticketBuyed->delete();

        $lottery = Lottery::find($ticketBuyed->lottery_id);

        return redirect()->route('ticketsBuyed.index', $lottery)->with('status','El premio se ha eleminado correctamente');
    }

    public function verificator($contest)
    {
        $lottery = Lottery::find($contest);

        return view('buy-ticket.verificator', ['lottery' => $lottery, "showTableVerificator" => false, "ticketBuyed" => new TicketBuyed]);
    }

    public function generator($contest)
    {
        $lottery = Lottery::find($contest);

        return view('buy-ticket.ticket-generator', ['lottery' => $lottery, "showTicket" => false, "ticketBuyed" => new TicketBuyed]);
    }

    public function getTicket($contest, Request $request)
    {
        $ticketBuyed = TicketBuyed::with(['otherTicketsBuyed'])->where('lottery_id', $contest)->where('ticket', $request['ticket'])->first();

        if(!isset($ticketBuyed)){
            $idTicketBuyed = OtherTicketBuyed::select('ticket_buyed_id')->where('lottery_id', $contest)->where('ticket', $request['ticket'])->first();
            if(isset($idTicketBuyed)){
                $ticketBuyed = TicketBuyed::with(['otherTicketsBuyed'])->where('lottery_id', $contest)->where('ticket', $idTicketBuyed->ticket_buyed_id)->first();
            }
        }

        $lottery = Lottery::find($contest);

        return view('buy-ticket.ticket-generator', ['lottery' => $lottery, "showTicket" => true, "ticketBuyed" => $ticketBuyed, "ticketAvailable" => $request['ticket'] ]);
    }
}

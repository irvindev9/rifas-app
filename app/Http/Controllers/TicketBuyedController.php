<?php

namespace App\Http\Controllers;

use App\Models\TicketBuyed;
use App\Models\OtherTicketBuyed;
use App\Models\Lottery;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use App\Exports\TicketBuyedExport;

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
        if(isset($_GET['no_paid'])){
            $ticketsBuyed = TicketBuyed::with(['otherTicketsBuyed'])->where('lottery_id', $lottery->id)->where('paid', 0)->orderBy('ticket')->get();
        }else{
            $ticketsBuyed = TicketBuyed::with(['otherTicketsBuyed'])->where('lottery_id', $lottery->id)->orderBy('ticket')->get();
        }

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
        // dd($request);
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

    public function deleteAll($id){
        $lottery = Lottery::with(['ticketsBuyed'])->find($id);

        foreach($lottery->ticketsBuyed as $ticket){
            if($ticket->paid == 0){
                $get_other_tickets = OtherTicketBuyed::where('ticket_buyed_id',$ticket->id)->delete();

                TicketBuyed::where('id', $ticket->id)->delete();
            }
        }

        return redirect()->route('ticketsBuyed.index', $id);
    }

    public function fileExport($lotteryId)
    {
        return Excel::download(new TicketBuyedExport($lotteryId), 'boletos-comprados.xlsx');
    }

    public function edit_extra($id)
    {
        $OtherTicketBuyed = OtherTicketBuyed::where('id',$id)->first();

        $lottery = Lottery::find($OtherTicketBuyed->lottery_id);

        return view('panel-admin.ticket-buyed-extra.edit', ['OtherTicketBuyed' => $OtherTicketBuyed,'lottery' => $lottery]);
    }

    public function update_extra(Request $request, OtherTicketBuyed $OtherTicketBuyed)
    {

        $validated = $request->validate([
            'ticket' => 'required|numeric'
        ]);

        if($exist = OtherTicketBuyed::where('lottery_id', $OtherTicketBuyed->lottery_id)->where('ticket', $validated['ticket'])->first()){
            return redirect()->route('ticketsBuyed.index', $OtherTicketBuyed->lottery_id)->with('status','El boleto ya existe');
        }

        $OtherTicketBuyed->ticket = $validated['ticket'];
        $OtherTicketBuyed->save();

        $lottery = Lottery::find($OtherTicketBuyed->lottery_id);

        return redirect()->route('ticketsBuyed.index', $lottery)->with('status','Se ha actualizado la compra');
    }

    public function destroy_extra(OtherTicketBuyed $OtherTicketBuyed)
    {

        $lottery = Lottery::find($OtherTicketBuyed->lottery_id);

        $OtherTicketBuyed->delete();

        return redirect()->route('ticketsBuyed.index', $lottery)->with('status','El boleto se ha eleminado correctamente');
    }
}

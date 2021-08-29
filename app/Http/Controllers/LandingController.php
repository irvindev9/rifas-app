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
        $image = Lottery::where('active', 1)->first();

        $image = isset($image) ? 'img/prizes/'.$image->image_lottery : 'img/silverado.jpg';

        return view('home.index')->with(compact(['image']));
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

    public function buyed_tickets(Request $request){
        $get_ticket_buyed = TicketBuyed::where('lottery_id', $request->lottery_id)->get()->map(function($q){
            return $q->ticket;
        });

        return Response($get_ticket_buyed);
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

    public function buy_ticket_form($lottery, $ticket){
        return view('ticket-buyed.index')->with(compact(['lottery', 'ticket']));
    }

    public function generate_other_tickets(){

        $lottery = Lottery::find(1);

        $number_of_tickets = 10000 / $lottery->quantity_tickets;

        $results = array_fill(0, ($number_of_tickets - 1), 0);

        $otherTickets = OtherTicketBuyed::where("lottery_id", $lottery->id)->get()->map(function ($q) {
            return $q->ticket;
        })->toArray();

        foreach($results as $key => $result){
            $ok = true;

            while($ok){
                $number = rand(($lottery->quantity_tickets + 1),10000);

                if(!in_array($number, $otherTickets) && !in_array($number, $results)){
                    $results[$key] = $number;
                    $ok = false;
                }
            }
        }

        return Response($results);
    }

    public function save_ticket(Request $request){

        $exist = TicketBuyed::where('lottery_id', $request->idLottery)->where('ticket', $request->ticket)->first();

        if(isset($exist)){
            if($exist->paid){
                return Response("Alguien más compro el boleto, intenta con otro!", 401);
            }else{
                return Response("Alguien tiene apartado el boleto, intenta con otro!", 401);
            }

        }


        $lottery = Lottery::find($request->idLottery);

        if(isset($lottery)){
            if($lottery->active == 0){
                return Response("Parece que esta rifa ya no esta disponible, intenta con otra!", 401);
            }
        }else{
            return Response("Parece que esta rifa no existe, revisa bien el url!", 401);
        }

        $ticket = new TicketBuyed();

        $ticket->lottery_id = $request->idLottery;
        $ticket->ticket = $request->ticket;
        $ticket->whats_number = $request->whatsapp;
        $ticket->name_client = $request->nombre;
        $ticket->lastname_client = $request->apellido;
        $ticket->lastname_M_client = $request->apellidoM;
        $ticket->state = $request->estado;
        $ticket->paid = 0;

        $ticket->save();

        $tickets_extra_plain = '';

        foreach($request->extra_tickets as $ticket_xtra){
            $ticket_extra = new OtherTicketBuyed();

            $ticket_extra->lottery_id = $request->idLottery;
            $ticket_extra->ticket_buyed_id = $ticket->id;
            $ticket_extra->ticket = $ticket_xtra;

            $ticket_extra->save();

            $tickets_extra_plain .= $ticket_xtra.' ';
        }

        $whats = "https://wa.me/526561280886?text=";

        $whats .= rawurlencode("Hola, aparte un boleto para la rifa:\r\n");
        $whats .= rawurlencode($lottery->name."\r\n");
        $whats .= rawurlencode("_________________________________\r\n");
        $whats .= rawurlencode("*Boleto*: ".$request->ticket." (".$tickets_extra_plain.")\r\n");
        $whats .= rawurlencode("*Nombre*: ".$request->nombre." ".$request->apellido."\r\n");
        $whats .= rawurlencode("*Costo del boleto*: $".$lottery->price_ticket."\r\n");
        $whats .= rawurlencode("_________________________________\r\n");
        $whats .= rawurlencode("Click aqui para ver formas de pago: www.rifasjunior.com/avisos/pagos\r\n");
        $whats .= rawurlencode("El siguiente paso es enviar foto del comprobante de pago por aquí\r\n");

        return Response($whats);

    }
}

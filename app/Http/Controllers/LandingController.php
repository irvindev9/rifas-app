<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Lottery;
use App\Models\Prize;
use App\Models\Setting;
use App\Models\TicketBuyed;
use App\Models\OtherTicketBuyed;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{

    public function index()
    {
        $image = Lottery::where('active', 1)->first();

        $lotteries = Lottery::where('active', 0)->where('award_img','<>', null)->get();
        $awards = new Collection();
        foreach($lotteries as $lottery){
            $awards->push(
                Lottery::select('prizes.prize', 'lotteries.name', 'lotteries.award_img')
                ->join('prizes', 'lotteries.id', '=', 'prizes.lottery_id')
                ->where('prizes.lottery_id', $lottery->id)
                ->orderBy('prizes.id')
                ->first()
            );
        }

        $image = isset($image) ? 'img/prizes/'.$image->image_lottery : 'img/silverado.jpg';

        return view('home.index', ['awards' => $awards])->with(compact(['image']));
    }

    public function active(){
        $lottery = Lottery::with(['prizes','ticketsBuyed'])
            ->where('active', 1)
            ->get()
            ->toJson();

        return response($lottery);
    }

    public function checkAvailability(Request $request){
        $exist = TicketBuyed::where('lottery_id', $request->idLottery)->where('ticket', $request->ticket)->first();

        if(isset($exist)){
            return Response("Alguien tiene apartado el boleto, intenta con otro!", 401);
        }

        $other = OtherTicketBuyed::where('lottery_id', $request->idLottery)->where('ticket_buyed_id', $request->ticket)->first();

        if(isset($other)){
            return Response("Alguien tiene apartado el boleto, intenta con otro!", 401);
        }

        return $this->generate_other_tickets($request->idLottery);
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

        return view('buy-ticket.verificator', ['lottery' => $lottery, "showTableVerificator" => true, "ticketBuyed" => $ticketBuyed, "ticketAvailable" => $request['ticket'] ]);
    }

    public function verificator($contest)
    {
        $lottery = Lottery::find($contest);

        return view('buy-ticket.verificator', ['lottery' => $lottery, "showTableVerificator" => false, "ticketBuyed" => new TicketBuyed]);
    }

    public function buy_ticket_form($lottery, $ticket){
        return view('ticket-buyed.index')->with(compact(['lottery', 'ticket']));
    }

    public function generate_other_tickets($id){
        $lottery = Lottery::find($id);

        $number_of_tickets = 10000;

        if($lottery->quantity_tickets == 100){
            $number_of_tickets = 100;
        }

        if($lottery->quantity_tickets == 500){
            $number_of_tickets = 1000;
        }

        $number_of_tickets = $number_of_tickets / $lottery->quantity_tickets;

        $results = array_fill(0, ($number_of_tickets - 1), 0);

        $otherTickets = OtherTicketBuyed::where("lottery_id", $lottery->id)->get()->map(function ($q) {
            return $q->ticket;
        })->toArray();

        foreach($results as $key => $result){
            $ok = true;

            while($ok){
                $number = rand(($lottery->quantity_tickets + 1),($number_of_tickets-1));

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
        $ticket->name_client = mb_strtoupper($request->nombre);
        $ticket->lastname_client = mb_strtoupper($request->apellido);
        $ticket->lastname_M_client = mb_strtoupper($request->apellidoM);
        $ticket->state = $request->estado;
        $ticket->paid = 0;

        $ticket->save();

        $tickets_plain = '';
        $tickets_extra_plain = '';

        foreach($request->extra_tickets as $ticket_xtra){
            $ticket_extra = new OtherTicketBuyed();

            $ticket_extra->lottery_id = $request->idLottery;
            $ticket_extra->ticket_buyed_id = $ticket->id;
            $ticket_extra->ticket = $ticket_xtra;

            $ticket_extra->save();

            $tickets_extra_plain .= $ticket_xtra.' ';
        }

        $tickets_plain .= rawurlencode("*Boleto*: ".$ticket->id." (".$tickets_extra_plain.")\r\n");
        

        foreach($request->other_tickets as $Oticket_xtra){
            $tickets_extra_plain = '';
            $Oticket = new TicketBuyed();

            $Oticket->lottery_id = $request->idLottery;
            $Oticket->ticket = $Oticket_xtra;
            $Oticket->whats_number = $request->whatsapp;
            $Oticket->name_client = mb_strtoupper($request->nombre);
            $Oticket->lastname_client = mb_strtoupper($request->apellido);
            $Oticket->lastname_M_client = mb_strtoupper($request->apellidoM);
            $Oticket->state = $request->estado;
            $Oticket->paid = 0;

            $Oticket->save();

            foreach($request->other_extra_tickets[$Oticket_xtra] as $ticket_xxtra){
                $ticket_extra = new OtherTicketBuyed();
    
                $ticket_extra->lottery_id = $request->idLottery;
                $ticket_extra->ticket_buyed_id = $Oticket->id;
                $ticket_extra->ticket = $ticket_xxtra;
    
                $ticket_extra->save();
    
                $tickets_extra_plain .= $ticket_xxtra.' ';
            }

            $tickets_plain .= rawurlencode("*Boleto*: ".$Oticket_xtra." (".$tickets_extra_plain.")\r\n");
        }

        $whats_number = Setting::where('code', 'whatsapp_config')->first();

        $whats = "https://wa.me/".strip_tags($whats_number->content)."?text=";

        $whats .= rawurlencode("Hola, aparte un boleto para la rifa:\r\n");
        $whats .= rawurlencode($lottery->name."\r\n");
        $whats .= rawurlencode("_________________________________\r\n");
        // $whats .= rawurlencode("*Boleto*: ".$request->ticket." (".$tickets_extra_plain.")\r\n");
        $whats .= $tickets_plain;
        $whats .= rawurlencode("*Nombre*: ".$request->nombre." ".$request->apellido." ".$request->apellidoM."\r\n");
        $whats .= rawurlencode("*Costo de cada boleto*: $".$lottery->price_ticket."\r\n");
        $whats .= rawurlencode("_________________________________\r\n");
        $whats .= rawurlencode("Click aqui para ver formas de pago: www.rifasjunior.com/aviso/pagos\r\n");
        $whats .= rawurlencode("El siguiente paso es enviar foto del comprobante de pago por este medio (whatsapp)\r\n");

        return Response($whats);

    }
}

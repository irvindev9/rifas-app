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
        $image = Setting::where('code', 'imagen_inicio')->first();

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

        $image = str_replace('<p>', "", $image->content);
        $image = str_replace('</p>', "", $image);
        $image = str_replace('<br>', "", $image);

        return view('home.index')->with(compact(['image', 'awards']));
    }

    public function active(){
        $lottery = Lottery::with(['prizes','ticketsBuyed'])
            ->where('active', 1)
            ->get()
            ->toJson();

        return response($lottery);
    }

    public function checkAvailability(Request $request){
        $lottery = Lottery::find($request->idLottery);

        if($lottery->quantity_tickets == 100){
            $number_of_tickets = 100;
        } else if($lottery->quantity_tickets == 500){
            $number_of_tickets = 1000;
        } else {
            $number_of_tickets = 10000;
        }

        if($request->ticket > $number_of_tickets){
            return Response("Fuera del limite!", 401);
        }

        $exist = TicketBuyed::where('lottery_id', $request->idLottery)->where('ticket', $request->ticket)->first();

        if(isset($exist)){
            return Response("Alguien tiene apartado el boleto, intenta con otro!", 401);
        }

        $other = OtherTicketBuyed::where('lottery_id', $request->idLottery)->where('ticket', $request->ticket)->first();

        if(isset($other)){
            return Response("Alguien tiene apartado el boleto, intenta con otro!", 401);
        }

        if($request->ticket > $lottery->quantity_tickets){
            return $this->generate_other_tickets($request->idLottery, 1);
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
        $lottery = Lottery::with(['prizes'])->where('active', 1)->where('lottery_number', $lottery)->first();

        $prize = Prize::where("lottery_id", $lottery->id)->where("active", 1)->first();

        $tickets = TicketBuyed::where('lottery_id', $lottery->id)->count();

        if($tickets == $lottery->quantity_tickets){
            return redirect()->route('saled.lottery', $lottery->id);
        }

        return view('buy-ticket.index')->with(compact(['lottery', 'prize']));
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

        $ticket = Lottery::find($lottery)->quantity_tickets == 10000 ? str_pad($ticket, 5, "0", STR_PAD_LEFT) : str_pad($ticket, 4, "0", STR_PAD_LEFT);

        return view('ticket-buyed.index')->with(compact(['lottery', 'ticket']));
    }

    public function generate_other_tickets($id, $reserve_ticket = null){
        $lottery = Lottery::find($id);

        $total_tickets = $lottery->quantity_tickets == 10000 ? 60000 : 10000;

        if($lottery->quantity_tickets == 100){
            $total_tickets = 100;
        }

        if($lottery->quantity_tickets == 500){
            $total_tickets = 1000;
        }

        $number_of_tickets = $total_tickets / $lottery->quantity_tickets;

        $results = array_fill(0, ($number_of_tickets - 1), 0);

        $otherTickets = OtherTicketBuyed::where("lottery_id", $lottery->id)->get()->map(function ($q) {
            return $q->ticket;
        })->toArray();

        foreach($results as $key => $result){
            $ok = true;

            while($ok){
                $number = rand(($lottery->quantity_tickets + 1),($total_tickets-1));

                // dd($total_tickets-1);

                if(!in_array($number, $otherTickets) && !in_array($number, $results)){
                    $results[$key] = $number;
                    $ok = false;
                }
            }
        }

        if(isset($reserve_ticket)){

            $buyedTickets = TicketBuyed::where("lottery_id", $lottery->id)->get()->map(function ($q) {
                return $q->ticket;
            })->toArray();

            if(count($buyedTickets) >= $lottery->quantity_tickets){
                return Response("Fuera del limite!", 401);
            } else {
                $ok = true;

                while($ok){
                    $number = rand(1, ($lottery->quantity_tickets));

                    if(!in_array($number, $buyedTickets)){
                        $ok = false;
                    }
                }
            }

            $existOther = TicketBuyed::where("lottery_id", $lottery->id)->where("ticket", $number)->first();

            if(!isset($existOther)){
                $results[0] = $number;
            }
        }

        return Response($results);
    }

    public function get_ticket_info($id){
        return Response(Lottery::find($id));
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
        $lottery_qty = $lottery->quantity_tickets == 10000 ? 5 : 4;

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

            $tickets_extra_plain .= str_pad($ticket_xtra, $lottery_qty, "0", STR_PAD_LEFT).' ';
        }

        $tickets_plain .= urlencode("Boleto: *".str_pad($ticket->ticket, $lottery_qty, "0", STR_PAD_LEFT)."*\r\n");
        $tickets_plain .= ($tickets_extra_plain) ? urlencode("Oportunidades: (*".$tickets_extra_plain."*)\r\n") : '';
        $tickets_plain .= urlencode("Costo por boleto: $*".$lottery->price_ticket."*\r\n");
        $tickets_plain .= urlencode("----------------------------------------\r\n");


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

                $tickets_extra_plain .= str_pad($ticket_xxtra, $lottery_qty, "0", STR_PAD_LEFT).' ';
            }

            $tickets_plain .= urlencode("Boleto: *".str_pad($Oticket_xtra, $lottery_qty, "0", STR_PAD_LEFT)."*\r\n");
            $tickets_plain .= ($tickets_extra_plain) ? urlencode("Oportunidades: (*".$tickets_extra_plain."*)\r\n") : '';
            $tickets_plain .= urlencode("Costo por boleto: $*".$lottery->price_ticket."*\r\n");
            $tickets_plain .= urlencode("----------------------------------------\r\n");
        }

        $whats_number = Setting::where('code', 'whatsapp_config')->first();

        $whats = "https://wa.me/".strip_tags($whats_number->content)."?text=";

        $whats .= urlencode("*Rifas Junior*:\r\n");
        $whats .= urlencode("Hola, mi nombre es *".$request->nombre." ".$request->apellido." ".$request->apellidoM."* de *".$request->estado."* y mi número de teléfono es *".$request->whatsapp ."*\r\n");
        $whats .= urlencode("He reservado boletos para la rifa:\r\n");
        $whats .= urlencode("*".$lottery->name."*\r\n");
        $whats .= urlencode("----------------------------------------\r\n");
        // $whats .= urlencode("*Boleto*: ".$request->ticket." (".$tickets_extra_plain.")\r\n");
        $whats .= $tickets_plain;
        $whats .= urlencode("*Nombre*: ".$request->nombre." ".$request->apellido." ".$request->apellidoM."\r\n");
        $whats .= urlencode("*Costo de cada boleto*: $".$lottery->price_ticket."\r\n");
        $whats .= urlencode("----------------------------------------\r\n");
        $whats .= urlencode("*Enlace de cuentas para pago:*\r\n");
        $whats .= urlencode("http://www.rifasjunior.com/aviso/pagos\r\n");
        $whats .= urlencode("Me comprometo a enviarle mi comprobante de pago lo antes posible por este medio, de no ser así acepto que mi(s) boleto(s) sea(n) liberado(s) para su venta en *48 hrs*.\r\n");

        return Response($whats);

    }
}

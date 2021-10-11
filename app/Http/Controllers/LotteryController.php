<?php

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\Prize;
use App\Models\OtherTicketBuyed;
use App\Models\TicketBuyed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LotteryController extends Controller
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
    public function index()
    {
        $lotteries = Lottery::all();

        return view('panel-admin.lotteries.index', ['lotteries' => $lotteries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel-admin.lotteries.create', ['lottery' => new Lottery]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'. time().'.'.$extension;

            $path = $request->image->move(public_path('img/prizes'), $fileNameToStore);
        } else
        {
            $fileNameToStore = null;
        }

        if ($request->hasFile('awardImage'))
        {
            $filenameWithExt = $request->file('awardImage')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('awardImage')->getClientOriginalExtension();
            $fileNameAwardImage = $filename.'_'. time().'.'.$extension;

            $path = $request->awardImage->move(public_path('img/prizes'), $fileNameAwardImage);
        } else
        {
            $fileNameAwardImage = null;
        }

        if ($request->hasFile('img_finished'))
        {
            $filenameWithExt = $request->file('img_finished')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img_finished')->getClientOriginalExtension();
            $fileNameImageFinished = $filename.'_'. time().'.'.$extension;

            $path = $request->img_finished->move(public_path('img/prizes'), $fileNameImageFinished);
        } else
        {
            $fileNameImageFinished = null;
        }

        $lottery = new Lottery;

        $validated = $request->validate([
            'name' => 'required',
            'lottery_number' => 'required|unique:lotteries,lottery_number',
            'qtyTickets' => 'required|numeric',
            'priceTicket' => 'required',
            'date' => 'required',
        ]);

        $lottery->name = $validated['name'];
        $lottery->lottery_number = $validated['lottery_number'];
        $lottery->quantity_tickets = $validated['qtyTickets'];
        $lottery->price_ticket = $validated['priceTicket'];
        $lottery->lastday_lottery = $request['date'];
        $lottery->image_lottery = $fileNameToStore;
        $lottery->info = $request['info'];
        $lottery->award_img = $fileNameAwardImage;
        $lottery->full_lottery_message = $request['full_lottery_message'];
        $lottery->img_finished = $fileNameImageFinished;
        $lottery->active = isset($request['active']) ? 1 : 0;

        $lottery->save();

        return redirect()->route('dashboard')->with('status','La rifa se ha creado');
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
    public function edit(Lottery $lottery)
    {
        return view('panel-admin.lotteries.edit', ['lottery' => $lottery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lottery $lottery)
    {
        if ($request->hasFile('image'))
        {
            $filenameWithExt = $request->file('image')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'. time().'.'.$extension;

            $path = $request->image->move(public_path('img/prizes'), $fileNameToStore);
        } else
        {
            $fileNameToStore = $lottery->image_lottery;
        }

        if ($request->hasFile('awardImage'))
        {
            $filenameWithExt = $request->file('awardImage')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('awardImage')->getClientOriginalExtension();
            $fileNameAwardImage = $filename.'_'. time().'.'.$extension;

            $path = $request->awardImage->move(public_path('img/prizes'), $fileNameAwardImage);
        } else
        {
            $fileNameAwardImage = $lottery->award_img ?? null;
        }

        if ($request->hasFile('img_finished'))
        {
            $filenameWithExt = $request->file('img_finished')->getClientOriginalName ();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('img_finished')->getClientOriginalExtension();
            $fileNameImageFinished = $filename.'_'. time().'.'.$extension;

            $path = $request->img_finished->move(public_path('img/prizes'), $fileNameImageFinished);
        } else
        {
            $fileNameImageFinished = $lottery->award_img ?? null;
        }

        $validated = $request->validate([
            'name' => 'required',
            'lottery_number' => 'required|unique:lotteries,lottery_number,'.$lottery->id,
            'qtyTickets' => 'required|numeric',
            'priceTicket' => 'required',
            'date' => 'required',
        ]);

        $lottery->name = $validated['name'];
        $lottery->lottery_number = $validated['lottery_number'];
        $lottery->quantity_tickets = $validated['qtyTickets'];
        $lottery->price_ticket = $validated['priceTicket'];
        $lottery->lastday_lottery = $request['date'];
        $lottery->image_lottery = $fileNameToStore;
        $lottery->info = $request['info'];
        $lottery->award_img = $fileNameAwardImage;
        $lottery->full_lottery_message = $request['full_lottery_message'];
        $lottery->img_finished = $fileNameImageFinished;
        $lottery->active = isset($request['active']) ? 1 : 0;

        $lottery->save();

        return redirect()->route('dashboard')->with('status','La rifa se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lottery $lottery)
    {
        Prize::where("lottery_id", $lottery->id)->delete();
        OtherTicketBuyed::where("lottery_id", $lottery->id)->delete();
        TicketBuyed::where("lottery_id", $lottery->id)->delete();
        $lottery->delete();

        return redirect()->route('dashboard')->with('status','La rifa se ha eleminado correctamente');
    }
}

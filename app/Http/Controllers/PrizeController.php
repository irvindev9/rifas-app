<?php

namespace App\Http\Controllers;

use App\Models\Prize;
use App\Models\Lottery;
use Illuminate\Http\Request;

class PrizeController extends Controller
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
        $prizes = Prize::where('lottery_id',  $lottery->id)->get();

        return view('panel-admin.prizes.index', ['prizes' => $prizes, 'lottery' => $lottery]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Lottery $lottery)
    {
        return view('panel-admin.prizes.create', ['prize' => new Prize, 'lottery' => $lottery]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lottery $lottery)
    {
        $prize = new Prize;

        $validated = $request->validate([
            'prize' => 'required',
            'date' => 'required',
        ]);

        $prize->prize = $validated['prize'];
        $prize->lottery_id = $lottery->id;
        $prize->date_lottery_prize = $request['date'];

        $prize->save();

        return redirect()->route('prizes.index', $lottery)->with('status','El premio se ha creado');
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
    public function edit(Prize $prize)
    {
        $lottery = Lottery::find($prize->lottery_id);

        return view('panel-admin.prizes.edit', ['prize' => $prize,'lottery' => $lottery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prize $prize)
    {
        $prizeUpdated = $prize;

        $validated = $request->validate([
            'prize' => 'required',
            'date' => 'required',
        ]);

        $prize->prize = $validated['prize'];
        $prize->date_lottery_prize = $request['date'];

        $prize->save();

        $lottery = Lottery::find($prize->lottery_id);

        return redirect()->route('prizes.index', $lottery)->with('status','El premio se ha actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prize $prize)
    {
        $prize->delete();

        $lottery = Lottery::find($prize->lottery_id);

        return redirect()->route('prizes.index', $lottery)->with('status','El premio se ha eleminado correctamente');
    }
}

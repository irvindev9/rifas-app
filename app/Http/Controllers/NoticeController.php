<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Lottery;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($advice)
    {
        $notice = Setting::where('code',$advice)->first()->content ?? '<p style="text-align:center">Ups! Algo esta mal, deberias <a href="/"> regresar </a></p>';
        return view('information-pages.notice')->with(compact(['notice']));
    }

    public function show_lottery($id){

        $notice = Lottery::find($id)->info ?? '<p style="text-align:center">Ups! Algo esta mal, deberias <a href="/"> regresar </a></p>';
        return view('information-pages.notice')->with(compact(['notice']));

    }

    public function saled($id)
    {
        $notice = Lottery::where('id',$id)->first()->full_lottery_message ?? '<p style="text-align:center">Ups! Algo esta mal, deberias <a href="/"> regresar </a></p>';
        return view('information-pages.notice')->with(compact(['notice']));
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

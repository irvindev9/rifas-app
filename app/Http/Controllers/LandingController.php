<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use Illuminate\Support\Facades\DB;


class LandingController extends Controller
{
    public function index()
    {
        $lottery = Lottery::with(['prizes','ticketsBuyed'])->where('active', 1)->get();

        return view('home.index', ['lottery' => $lottery]);
    }
}

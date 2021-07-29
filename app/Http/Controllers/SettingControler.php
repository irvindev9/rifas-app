<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingControler extends Controller
{
    public function index()
    {
        //$lottery = Lottery::select('id', 'name', 'quantity_tickets', 'price_ticket', 'lastday_lottery')->get();
        $settings = Setting::paginate();

        //dd($lottery);

        return view('panel-admin.admin-settings.index', ['settings' => $settings]);

    }
}

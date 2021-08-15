<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();
        \App\Models\Lottery::factory(1)->create();
        \App\Models\Prize::factory(5)->create();
        \App\Models\TicketBuyed::factory(1)->create();
        \App\Models\Setting::factory(1)->create();
        \App\Models\OtherTicketBuyed::factory(1)->create();

    }
}

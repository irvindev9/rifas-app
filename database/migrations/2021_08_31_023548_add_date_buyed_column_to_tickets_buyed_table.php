<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateBuyedColumnToTicketsBuyedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_buyeds', function (Blueprint $table) {
            $table->dateTime('date_buyed', 0)->nullable()->after('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_buyeds', function (Blueprint $table) {
            $table->dropColumn(['date_buyed']);
        });
    }
}

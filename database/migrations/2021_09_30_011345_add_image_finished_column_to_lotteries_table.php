<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageFinishedColumnToLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lotteries', function (Blueprint $table) {
            $table->string("img_finished")->nullable()->after("full_lottery_message");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lotteries', function (Blueprint $table) {
            $table->dropColumn('img_finished');
        });
    }
}

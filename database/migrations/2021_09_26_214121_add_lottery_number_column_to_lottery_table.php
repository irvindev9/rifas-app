<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLotteryNumberColumnToLotteryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lotteries', function (Blueprint $table) {
            $table->unsignedBigInteger("lottery_number")->unique()->after("full_lottery_message")->nullable();
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
            $table->dropColumn('lottery_number');
        });
    }
}

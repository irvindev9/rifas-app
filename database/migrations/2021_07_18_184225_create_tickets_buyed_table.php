<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsBuyedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_buyeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lottery_id");
            $table->integer("ticket");
            $table->string("name_client")->nullable();
            $table->string("lastname_client")->nullable();
            $table->string("whats_number")->nullable();
            $table->string("state")->nullable();
            $table->tinyInteger("paid")->default(0);
            $table->timestamps();

            $table->foreign('lottery_id')->references('id')->on('lotteries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets_buyed');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherTicketsBuyed extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_ticket_buyeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("lottery_id");
            $table->unsignedBigInteger("ticket_buyed_id");
            $table->integer("ticket");
            $table->timestamps();

            $table->foreign('lottery_id')->references('id')->on('lotteries');
            $table->foreign('ticket_buyed_id')->references('id')->on('ticket_buyeds');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_tickets_buyed');
    }
}

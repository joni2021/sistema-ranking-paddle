<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('day');
            $table->time('from');
            $table->time('to');
            $table->unsignedInteger('court_id');
            $table->unsignedInteger('user_id');


            $table->foreign('court_id')->on('courts')->references('id')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}

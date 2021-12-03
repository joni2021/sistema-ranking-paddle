<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->time('time');
            $table->boolean('doubles')->default(0);
            $table->unsignedTinyInteger('sets_id');
            $table->unsignedInteger('courts_id');
            $table->unsignedInteger('users_id');
            $table->unsignedTinyInteger('state')->default(0);

            // relaciones
            $table->foreign('set_id')->on('sets')->references('id')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->foreign('court_id')->on('courts')->references('id')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->foreign('user_id')->on('users')->references('id')->onDelete('NO ACTION')->onUpdate('CASCADE');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}

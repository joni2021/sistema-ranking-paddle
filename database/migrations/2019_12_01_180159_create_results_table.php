<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('match_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('set_1')->nullable();
            $table->unsignedTinyInteger('set_2')->nullable();
            $table->unsignedTinyInteger('set_3')->nullable();
            $table->unsignedTinyInteger('set_4')->nullable();
            $table->unsignedTinyInteger('set_5')->nullable();
            $table->boolean("winner")->nullable();

            // relaciones
            $table->foreign('match_id')->references('id')->on("matches")->onDelete('NO ACTION')->onUpdate("CASCADE");
            $table->foreign('user_id')->references('id')->on("users")->onDelete('NO ACTION')->onUpdate("CASCADE");;
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
        Schema::dropIfExists('results');
    }
}

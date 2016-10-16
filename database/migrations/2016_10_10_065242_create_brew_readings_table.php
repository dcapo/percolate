<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrewReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brew_readings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brew_id')->unsigned()->index();
            $table->double('temperature');
            $table->double('time');
            $table->double('pressure');
            $table->timestamps();

            $table->foreign('brew_id')
                  ->references('id')
                  ->on('brews')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brew_readings');
    }
}

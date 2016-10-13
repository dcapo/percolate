<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roasts', function (Blueprint $table) {
            $table->increments('id');

            $table->date('roasted_at');
            $table->integer('bean_id')->unsigned()->index();
            $table->time('drying_time');
            $table->time('maillard_time');
            $table->time('development_time');
            $table->double('drop_temperature');

            $table->timestamps();

            $table->foreign('bean_id')
                  ->references('id')
                  ->on('beans')
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
        Schema::dropIfExists('roasts');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brews', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('brewed_at');
            $table->integer('roast_id')->unsigned()->index()->nullable();
            $table->integer('brew_style_id')->unsigned()->index();
            $table->double('average_temperature');
            $table->double('temperature_delta');
            $table->integer('fine')->nullable();
            $table->char('finer', 1)->nullable();
            $table->text('extra_fields')->nullable();
            $table->timestamps();

            $table->foreign('roast_id')
                  ->references('id')
                  ->on('roasts')
                  ->onDelete('cascade');

            $table->foreign('brew_style_id')
                  ->references('id')
                  ->on('brew_styles')
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
        Schema::dropIfExists('brews');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTastingNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasting_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tasting_id')->unsigned()->index();
            $table->string('name');
            $table->timestamps();

            $table->foreign('tasting_id')
                  ->references('id')
                  ->on('tastings')
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
        Schema::dropIfExists('tasting_notes');
    }
}

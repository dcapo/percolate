<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTastingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tastings', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamp('tasted_at');
            $table->integer('user_id')->unsigned()->index();
            $table->float('overall_score');
            $table->float('dry_fragrance');
            $table->float('wet_aroma');
            $table->float('brightness');
            $table->float('flavor');
            $table->float('body');
            $table->float('finish');
            $table->float('sweetness');
            $table->float('clean_cup');
            $table->float('complexity');
            $table->float('uniformity');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('tastings');
    }
}

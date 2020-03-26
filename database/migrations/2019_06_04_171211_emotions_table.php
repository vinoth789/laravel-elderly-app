<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EmotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emotions', function (Blueprint $table) {
            $table->increments('e_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->decimal('motivation')->unsigned();
            $table->decimal('high_mood')->unsigned();
            $table->decimal('relaxation')->unsigned();
            $table->decimal('indifference')->unsigned();
            $table->decimal('sadness')->unsigned();
            $table->decimal('frustration')->unsigned();
            $table->decimal('emotions_results')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emotions', function (Blueprint $table) {
            //
        });
    }
}

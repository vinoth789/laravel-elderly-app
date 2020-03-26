<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PhysicalFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physical_functions', function (Blueprint $table) {
            $table->increments('pf_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->decimal('holding_positions')->unsigned();
            $table->decimal('changing_positions')->unsigned();
            $table->decimal('walking')->unsigned();
            $table->decimal('climbing_stairs')->unsigned();
            $table->decimal('known_pain')->unsigned();
            $table->decimal('unknown_pain')->unsigned();
            $table->decimal('fall_asleep')->unsigned();
            $table->decimal('sleeping_duration')->unsigned();
            $table->decimal('physical_results')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('physical_functions', function (Blueprint $table) {
            //
        });
    }
}

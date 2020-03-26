<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Results extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->increments('s_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->decimal('pf_results')->references('physical_results')->on('physical_functions');
            $table->decimal('cf_results')->references('cognitive_results')->on('cognitive_functions');
            $table->decimal('r_results')->references('relationships_results')->on('relationships');
            $table->decimal('e_results')->references('emotions_results')->on('emotions');
            $table->decimal('sc_results')->references('self_care_results')->on('self_care');
            $table->decimal('external_variable')->unsigned();
            $table->decimal('well_being')->unsigned();
            $table->decimal('quality_of_life')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('results', function (Blueprint $table) {
            //
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SelfCare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('self_care', function (Blueprint $table) {
            $table->increments('s_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->decimal('pf_results')->references('physical_results')->on('physical_functions');
            $table->decimal('cf_results')->references('cognitive_results')->on('cognitive_functions');
            $table->decimal('r_results')->references('relationships_results')->on('relationships');
            $table->decimal('e_results')->references('emotions_results')->on('emotions');
            $table->decimal('nutrition')->unsigned();
            $table->decimal('hygiene')->unsigned();
            $table->decimal('household')->unsigned();
            $table->decimal('participation')->unsigned();
            $table->decimal('self_determination')->unsigned();
            $table->decimal('self_care_results')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('self_care', function (Blueprint $table) {
            //
        });
    }
}

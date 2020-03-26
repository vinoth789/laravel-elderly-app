<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Relationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relationships', function (Blueprint $table) {
            $table->increments('r_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->decimal('f_family')->unsigned();
            $table->decimal('f_friends')->unsigned();
            $table->decimal('f_partnership')->unsigned();
            $table->decimal('f_nursing_staff')->unsigned();
            $table->decimal('f_acquaintances')->unsigned();
            $table->decimal('e_family')->unsigned();
            $table->decimal('e_friends')->unsigned();
            $table->decimal('e_partnership')->unsigned();
            $table->decimal('e_nursing_staff')->unsigned();
            $table->decimal('e_acquaintances')->unsigned();
            $table->decimal('relationships_results')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('relationships', function (Blueprint $table) {
            //
        });
    }
}

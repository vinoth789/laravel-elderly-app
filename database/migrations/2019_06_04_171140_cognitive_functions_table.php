<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CognitiveFunctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cognitive_functions', function (Blueprint $table) {
            $table->increments('cf_id');
            $table->integer('user_id')->references('id')->on('users');
            $table->decimal('expresiion')->unsigned();
            $table->decimal('understanding')->unsigned();
            $table->decimal('concentration')->unsigned();
            $table->decimal('memory')->unsigned();
            $table->decimal('orientation')->unsigned();
            $table->decimal('cognitive_results')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cognitive_functions', function (Blueprint $table) {
            //
        });
    }
}

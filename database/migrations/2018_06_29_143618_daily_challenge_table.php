<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DailyChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_challenge', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionId')->default('0');
            $table->string('user_id')->default('0')->nullable();
            $table->string('status')->default('InProgress');
            $table->date('chal_date');
            $table->timestamps();
        });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daily_challenge');
    }
}

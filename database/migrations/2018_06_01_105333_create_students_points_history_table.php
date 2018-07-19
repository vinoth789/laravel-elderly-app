<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsPointsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_history', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('quiz_number')->unsigned();
            $table->string('quiz_name');
            $table->integer('totalQuestions');
            $table->integer('correctAnswers');
            $table->integer('wrongAnswers');
            $table->integer('pointsEarned');
            $table->string('studentQuizStatus')->nullable();
            $table->timestamps();

        });

            Schema::table('points_history', function($table) {
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('quiz_number')->references('id')->on('quiz_details');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points_history');
    }
}

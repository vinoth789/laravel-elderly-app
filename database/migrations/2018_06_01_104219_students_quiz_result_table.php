<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StudentsQuizResultTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('quiz_number')->unsigned();
            $table->integer('question_number')->unsigned();
            $table->string('answer')->nullable();
            $table->string('is_correct');
            $table->string('points')->default('0');
            $table->timestamps();

        });

        Schema::table('quiz_results', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('quiz_number')->references('id')->on('quiz_details');
            $table->foreign('question_number')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
}

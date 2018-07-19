<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quizNumber')->unsigned()->default('0');
            $table->string('quizName');
            $table->integer('questionsAdded')->default('0');
            $table->string('teacherQuizStatus')->default('InProgress');
            $table->string('timerStatus')->default('Off');
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
        Schema::dropIfExists('quiz_details');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionNumber')->default('0');
            $table->string('question');
            $table->string('choice1')->nullable();
            $table->string('choice2')->nullable();
            $table->string('choice3')->nullable();
            $table->string('choice4')->nullable();
            $table->string('answer');
            $table->string('isRangeAllowed')->default('No');
            $table->string('questionType');
            $table->string('difficultyLevel');
            $table->string('isNew')->default('Yes');
            $table->integer('quizNumber');
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
        Schema::dropIfExists('questions');
    }
}

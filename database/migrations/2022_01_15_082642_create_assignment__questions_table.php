<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment__questions', function (Blueprint $table) {
            $table->id();
            $table->string('QuestionID');
            $table->string('AssignmentID');
            $table->string('QuestionTitle');
            $table->string('OptionCorrect')->nullable();
            $table->string('Option2')->nullable();
            $table->string('Option3')->nullable();
            $table->string('Option4')->nullable();
            $table->string('Option5')->nullable();
            $table->string('AnswerFile')->nullable();
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
        Schema::dropIfExists('assignmentquestions');
    }
}

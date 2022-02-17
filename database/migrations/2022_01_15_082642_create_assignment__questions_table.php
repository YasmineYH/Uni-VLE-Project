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
        Schema::create("assignment__questions", function (Blueprint $table) {
            $table->id();
            $table->string("`Question_ID`");
            $table->string("`Assignment_ID`");
            $table->string("`Question_Title`");
            $table->string("`Option_Correct`")->nullable();
            $table->string("`Option_2`")->nullable();
            $table->string("`Option_3`")->nullable();
            $table->string("`Option_4`")->nullable();
            $table->string("`Option_5`")->nullable();
            $table->string("`Answer_File`")->nullable();
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
        Schema::dropIfExists("assignment__questions");
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();
            $table->string('Course_ID');
            $table->string('Assignment_Type');
            $table->date('Date_Added');
            $table->date('Submission_Deadline')->nullable();
            $table->date('Extended_Deadline')->nullable();
            $table->integer('Total_Mark')->nullable();
            $table->string('Removed')->nullable();
            $table->string('Expired')->nullable();
            $table->string('Draft')->nullable();
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
        Schema::dropIfExists('assignments');
    }
}

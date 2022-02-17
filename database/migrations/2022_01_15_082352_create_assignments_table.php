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
            $table->string('CourseID');
            $table->string('AssignmentType');
            $table->date('DateAdded');
            $table->date('SubmissionDeadline')->nullable();
            $table->date('ExtendedDeadline')->nullable();
            $table->integer('TotalMark')->nullable();
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

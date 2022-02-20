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
            $table->string('courseid');
            $table->string('assignmenttype');
            $table->date('dateadded');
            $table->date('submissiondeadline')->nullable();
            $table->date('extendeddeadline')->nullable();
            $table->integer('totalmark')->nullable();
            $table->string('removed')->nullable();
            $table->string('expired')->nullable();
            $table->string('draft')->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string("`Student_ID`")->unique();
            $table->string("`Student_Firstname`");
            $table->string("`Student_Middlename`");
            $table->string("`Student_Lastname`");
            $table->string("Level");
            $table->string("Phone");
            $table->string("Email");
            $table->string("Profile");
            $table->string("Password");
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
        Schema::dropIfExists('students');
    }
}

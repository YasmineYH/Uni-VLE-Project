<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lecturers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();
            $table->string('`Lecturer_ID`')->unique();
            $table->string('`Lecturer_Firstname`');
            $table->string('`Lecturer_Middlename`');
            $table->string('`Lecturer_Lastname`');
            $table->string('Phone');
            $table->string('Email');
            $table->string('Status');
            $table->string('Profile');
            $table->string('Password');
            $table->timestamp('`email_verified_at`')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('lecturers');
    }
}

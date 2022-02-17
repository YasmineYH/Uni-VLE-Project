<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use DB;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("courses", function (Blueprint $table) {
            $table->id();
            $table->string("`Course_ID`")->unique();
            $table->string("`Course_Code`");
            $table->string("`Course_Title`");
            $table->string("`Lecturer_ID`");
            $table->timestamps();
        });

        DB::table('courses')->insert(["crs/001", "CSC 420", "Software Engineering", "17/4356"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("courses");
    }
}

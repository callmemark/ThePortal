<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_grades', function(Blueprint $table){
            $table -> id();
            $table -> foreignId('class_enrollment_id');
            $table -> float('grade', 8, 2);
            $table -> foreignId('updated_by');
            $table -> string('updated_by_role');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_grades');
    }
};

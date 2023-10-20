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
        Schema::create('class_enrollments', function(Blueprint $table){
            $table -> id();
            $table -> foreignId('student_register_id');
            $table -> foreignId('instructor_subject_mapping_id');
            $table -> foreignId('admin_creator_id');
            $table -> string('classroom');
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
        Schema::drop('class_enrollments');
    }
};

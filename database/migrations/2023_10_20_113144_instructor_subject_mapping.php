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
        Schema::create('instructor_subject_mappings', function(Blueprint $table){
            $table -> id();
            $table -> foreignId('instructor_id');
            $table -> foreignId('subject_id');
            $table -> foreignId('admin_creator_id');
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
        Schema::drop('instructor_subject_mappings');
    }
};

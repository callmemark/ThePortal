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
        Schema::create('instructor_registers', function(Blueprint $table){
            $table -> id();
            $table -> string('first_name');
            $table -> string('middle_name');
            $table -> string('last_name');
            $table -> integer('age');
            $table -> date('birthdate');
            $table -> string('gender');
            $table -> string('home_address');
            $table -> string('contact_number');
            $table -> string('personal_email');
            $table -> string('civil_status');
            $table -> string('nationality');
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
        Schema::drop('instructor_registers');
    }
};

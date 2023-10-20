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
        Schema::create('admin_registers', function(Blueprint $table){
            $table -> id();
            $table -> string('first_name');
            $table -> string('middle_name');
            $table -> string('last_name');
            $table -> string('personal_email');
            $table -> integer('age');
            $table -> date('birthdate');
            $table -> string('gender');
            $table -> integer('contact_number');
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
        Schema::drop('admin_registers');
    }
};

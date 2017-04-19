<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_members', function (Blueprint $table) {
            $table->increments('cmid');
            $table->string('first_name'); // first name of core member
            $table->string('last_name'); // last name of core member
            $table->string('function'); // function of core member
            $table->date('birth_year'); // birth year of core member
            $table->string('photo'); // photo of core member
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
        Schema::dropIfExists('core_members');
    }
}

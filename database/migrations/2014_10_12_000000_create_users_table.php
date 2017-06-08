<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name'); // first name of user
            $table->string('last_name'); // last name of user
            $table->string('email')->unique(); // email of user
            $table->date('birth_year'); // birth year of user
            $table->string('photo'); // photo of user
            // $table->string('place_of_residence'); // place of residence of user
            $table->integer('role_id');
            $table->string('password'); // password of user
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}

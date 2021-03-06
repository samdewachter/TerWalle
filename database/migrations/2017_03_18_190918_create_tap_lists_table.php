<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTapListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tap_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title'); // name of user that opens TW
            $table->datetime('start'); // date of opening
            $table->datetime('end');
            $table->integer('user_id');
            $table->boolean('allDay');
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
        Schema::dropIfExists('tap_lists');
    }
}

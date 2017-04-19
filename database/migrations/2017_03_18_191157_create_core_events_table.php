<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoreEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('core_events', function (Blueprint $table) {
            $table->increments('ceid');
            $table->string('name'); // event name
            $table->date('start_date'); // start date of event
            $table->date('end_date'); // end date of event
            $table->string('description'); // description of event
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
        Schema::dropIfExists('core_events');
    }
}

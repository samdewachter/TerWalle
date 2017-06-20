<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class TapperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tappers = [
    		[
    			"title" => "Sam De Wachter",
                "start" => date("Y-m-d H:i:s", strtotime("2017-06-25 20:00:00")),
                "end" => date("Y-m-d H:i:s", strtotime("2017-06-25 23:59:59")),
                "user_id" => 1,
                "allDay" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"title" => "Tommy Schippers",
                "start" => date("Y-m-d H:i:s", strtotime("2017-06-26 20:00:00")),
                "end" => date("Y-m-d H:i:s", strtotime("2017-06-26 23:59:59")),
                "user_id" => 2,
                "allDay" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"title" => "Francis Blockeel",
                "start" => date("Y-m-d H:i:s", strtotime("2017-06-27 20:00:00")),
                "end" => date("Y-m-d H:i:s", strtotime("2017-06-27 23:59:59")),
                "user_id" => 3,
                "allDay" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"title" => "Jeroen Caluwé",
                "start" => date("Y-m-d H:i:s", strtotime("2017-06-28 20:00:00")),
                "end" => date("Y-m-d H:i:s", strtotime("2017-06-28 23:59:59")),
                "user_id" => 4,
                "allDay" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"title" => "Caroline Van Raemdonck",
                "start" => date("Y-m-d H:i:s", strtotime("2017-06-29 20:00:00")),
                "end" => date("Y-m-d H:i:s", strtotime("2017-06-29 23:59:59")),
                "user_id" => 5,
                "allDay" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"title" => "Gilles Van Hul",
                "start" => date("Y-m-d H:i:s", strtotime("2017-06-24 20:00:00")),
                "end" => date("Y-m-d H:i:s", strtotime("2017-06-24 23:59:59")),
                "user_id" => 6,
                "allDay" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    	];

        DB::table('tap_lists')->insert($tappers);
    }
}

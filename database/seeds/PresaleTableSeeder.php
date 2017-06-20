<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PresaleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presales = [
    		[
    			"description" => "headAdmin",
                "member_price" => 3,
                "non_member_price" => 5,
                "event_id" => 1,
                "deadline" => date("Y-m-d",strtotime("2017-08-30")),
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    	];

    	$tickets = [
    		[
    			"paid_member" => 1,
                "user_id" => 2,
                "presale_id" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"paid_member" => 1,
                "user_id" => 3,
                "presale_id" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"paid_member" => 1,
                "user_id" => 4,
                "presale_id" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"paid_member" => 0,
                "user_id" => 5,
                "presale_id" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"paid_member" => 1,
                "user_id" => 6,
                "presale_id" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"paid_member" => 0,
                "user_id" => 7,
                "presale_id" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    	];

    	DB::table('tickets')->insert($tickets);
        DB::table('presales')->insert($presales);
    }
}

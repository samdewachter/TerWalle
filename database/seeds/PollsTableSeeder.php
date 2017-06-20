<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PollsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $polls = [
    		[
    			"title" => "Wat is de volgende groepsactiviteit?",
                "deadline" => date("Y-m-d",strtotime("2017-08-30")),
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		]
    	];

    	$poll_answers = [
    		[
    			"poll_id" => 1,
    			"answer" => "Paintballen"
    		],
    		[
    			"poll_id" => 1,
    			"answer" => "Gaan eten in de wereldkeuken"
    		],
    		[
    			"poll_id" => 1,
    			"answer" => "Waterpretpark"
    		],
    	];

    	$poll_results = [
    		[
    			"answer_poll_id" => 1,
    			"poll_id" => 1,
    			"user_id" => 1,
    		],
    		[
    			"answer_poll_id" => 1,
    			"poll_id" => 1,
    			"user_id" => 2,
    		],
    		[
    			"answer_poll_id" => 1,
    			"poll_id" => 1,
    			"user_id" => 3,
    		],
    		[
    			"answer_poll_id" => 3,
    			"poll_id" => 1,
    			"user_id" => 4,
    		],
    		[
    			"answer_poll_id" => 3,
    			"poll_id" => 1,
    			"user_id" => 5,
    		],
    		[
    			"answer_poll_id" => 1,
    			"poll_id" => 1,
    			"user_id" => 6,
    		],
    		[
    			"answer_poll_id" => 2,
    			"poll_id" => 1,
    			"user_id" => 7,
    		],
    	];

    	DB::table('answer_polls')->insert($poll_answers);
    	DB::table('poll_results')->insert($poll_results);
        DB::table('polls')->insert($polls);
    }
}

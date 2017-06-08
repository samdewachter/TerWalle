<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
    		[
    			"title" => "fzefzefz",
                "description" => "fzefzef",
    			"start_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"end_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"cover" => "...",
    			"facebook_id" => 0,
    			"publish" => 0,
    		],
    		[
    			"title" => "fzefzefz",
                "description" => "fzefzef",
    			"start_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"end_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"cover" => "...",
    			"facebook_id" => 0,
    			"publish" => 0,
    		],
    		[
    			"title" => "fzefzefz",
                "description" => "fzefzef",
    			"start_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"end_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"cover" => "...",
    			"facebook_id" => 0,
    			"publish" => 0,
    		],
    		[
    			"title" => "fzefzefz",
                "description" => "fzefzef",
    			"start_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"end_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"cover" => "...",
    			"facebook_id" => 0,
    			"publish" => 0,
    		],
    		[
    			"title" => "fzefzefz",
                "description" => "fzefzef",
    			"start_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"end_time" => Carbon::now()->format('Y-m-d H:i:s'),
    			"cover" => "...",
    			"facebook_id" => 0,
    			"publish" => 0,
    		],
    	];

    	DB::table('events')->insert($events);
    }
}

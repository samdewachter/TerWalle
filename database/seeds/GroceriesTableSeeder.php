<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GroceriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groceries = [
    		[
    			"name" => "KWB TW frituur",
                "needed_at" => date("Y-m-d",strtotime("2017-08-30")),
                "done" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"name" => "Drank Ice Party",
                "needed_at" => date("Y-m-d",strtotime("2017-08-30")),
                "done" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"name" => "Kuisproducten",
                "needed_at" => date("Y-m-d",strtotime("2017-08-30")),
                "done" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    	];

    	$grocery_items = [
    		[
    			"item" => "Dozen curryworsten",
    			"quantity" => 2,
    			"grocery_id" => 1,
    			"done" => 0
    		],
    		[
    			"item" => "Dozen partysnacks",
    			"quantity" => 2,
    			"grocery_id" => 1,
    			"done" => 0
    		],
    		[
    			"item" => "Flessen triple sec",
    			"quantity" => 3,
    			"grocery_id" => 2,
    			"done" => 1
    		],
    		[
    			"item" => "Flessen fruitsap",
    			"quantity" => 6,
    			"grocery_id" => 2,
    			"done" => 1
    		],
    		[
    			"item" => "Flessen wodka",
    			"quantity" => 2,
    			"grocery_id" => 2,
    			"done" => 1
    		],
    		[
    			"item" => "Pakken sponsjes",
    			"quantity" => 2,
    			"grocery_id" => 3,
    			"done" => 1
    		],
    		[
    			"item" => "Flessen allesreiniger",
    			"quantity" => 4,
    			"grocery_id" => 3,
    			"done" => 0
    		],
    	];
    	DB::table('grocery_items')->insert($grocery_items);
        DB::table('groceries')->insert($groceries);
    }
}

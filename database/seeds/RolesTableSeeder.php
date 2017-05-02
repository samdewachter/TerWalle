<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		[
    			"role" => "headAdmin",
                "display_name" => "head admin",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"role" => "subAdmin",
                "display_name" => "admin",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"role" => "guest",
                "display_name" => "",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"role" => "anonymous",
                "display_name" => "",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		]
    	];

        DB::table('roles')->insert($roles);
    }
}

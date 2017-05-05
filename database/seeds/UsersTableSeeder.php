<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		"first_name" => "Sam",
        		"last_name" => "De Wachter",
        		"email" => "samdewachter@gmail.com",
        		"birth_year" => "1994-07-07",
        		"photo" => "default.jpg",
        		"role_id" => 1,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
        		"first_name" => "Tommy",
        		"last_name" => "Schippers",
        		"email" => "tommyschippers@gmail.com",
        		"birth_year" => "1997-07-14",
        		"photo" => "default.jpg",
        		"role_id" => 2,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
        		"first_name" => "Francis",
        		"last_name" => "Blockeel",
        		"email" => "francisblockeel@gmail.com",
        		"birth_year" => "1994-04-13",
        		"photo" => "default.jpg",
        		"role_id" => 2,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
        		"first_name" => "Remco",
        		"last_name" => "Thys",
        		"email" => "remcothys@gmail.com",
        		"birth_year" => "1995-09-23",
        		"photo" => "default.jpg",
        		"role_id" => 3,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	]
        ];

        $users2 = [];

        for ($i=0; $i < 10; $i++) { 
            $random = [
                "first_name" => str_random(10),
                "last_name" => str_random(10),
                "email" => str_random(10),
                "birth_year" => "1994-07-07",
                "photo" => str_random(10),
                "role_id" => 1,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ];

            $users2[] = $random;
        }
        DB::table('users')->insert($users2);
        DB::table('users')->insert($users);
    }
}

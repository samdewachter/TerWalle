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
                "title_url" => "Sam-De-Wachter",
        		"email" => "samdewachter@gmail.com",
        		"birth_year" => "1994-07-07",
        		"photo" => "Sam.png",
        		"role_id" => 1,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
        		"first_name" => "Tommy",
        		"last_name" => "Schippers",
                "title_url" => "Tommy-Schippers",
        		"email" => "tommyschippers@gmail.com",
        		"birth_year" => "1997-07-14",
        		"photo" => "Tommy.png",
        		"role_id" => 2,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	],
        	[
        		"first_name" => "Francis",
        		"last_name" => "Blockeel",
                "title_url" => "Francis-Blockeel",
        		"email" => "francisblockeel@gmail.com",
        		"birth_year" => "1994-04-13",
        		"photo" => "Francis.png",
        		"role_id" => 2,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	],
            [
                "first_name" => "Jeroen",
                "last_name" => "Caluwé",
                "title_url" => "Jeroen-Caluwe",
                "email" => "jeroencaluwe@gmail.com",
                "birth_year" => "1994-07-07",
                "photo" => "Jeroen.png",
                "role_id" => 1,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "first_name" => "Caroline",
                "last_name" => "Van Raemdonck",
                "title_url" => "Caroline-Van-Raemdonck",
                "email" => "carolinevanraemdonck@gmail.com",
                "birth_year" => "1994-07-07",
                "photo" => "Caroline.png",
                "role_id" => 2,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "first_name" => "Gilles",
                "last_name" => "Van Hul",
                "title_url" => "Gilles-Van-Hul",
                "email" => "gillesvanhul@gmail.com",
                "birth_year" => "1994-07-07",
                "photo" => "Gilles.png",
                "role_id" => 2,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "first_name" => "Davy",
                "last_name" => "Bolsens",
                "title_url" => "Davy-Bolsens",
                "email" => "davybolsens@gmail.com",
                "birth_year" => "1994-07-07",
                "photo" => "Davy.png",
                "role_id" => 2,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "first_name" => "Diego",
                "last_name" => "Van Havere",
                "title_url" => "Diego-Van-Havere",
                "email" => "diegovanhavere@gmail.com",
                "birth_year" => "1994-07-07",
                "photo" => "Diego.png",
                "role_id" => 2,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "first_name" => "Anouk",
                "last_name" => "Braem",
                "title_url" => "Anouk-Braem",
                "email" => "anoukbraem@gmail.com",
                "birth_year" => "1994-07-07",
                "photo" => "Anouk.png",
                "role_id" => 2,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                "first_name" => "Jorgen",
                "last_name" => "Declerck",
                "title_url" => "Jorgen-Declerck",
                "email" => "jorgendeclerck@gmail.com",
                "birth_year" => "1994-07-07",
                "photo" => "Jorgen.png",
                "role_id" => 2,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
        	[
        		"first_name" => "Remco",
        		"last_name" => "Thys",
                "title_url" => "Remco-Thys",
        		"email" => "remcothys@gmail.com",
        		"birth_year" => "1995-09-23",
        		"photo" => "default.png",
        		"role_id" => 3,
        		"password" => Hash::make('test'),
        		"created_at" => Carbon::now()->format('Y-m-d H:i:s')
        	],
            [
                "first_name" => "Extern",
                "last_name" => "Extern",
                "title_url" => "Extern",
                "email" => "extern@extern.be",
                "birth_year" => "1995-09-23",
                "photo" => "default.png",
                "role_id" => 2,
                "password" => Hash::make('test'),
                "created_at" => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];

        DB::table('users')->insert($users);
    }
}

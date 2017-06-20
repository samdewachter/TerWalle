<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ContactMessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contactMessages = [
    		[
    			"name" => "Sven schippers",
                "email" => "svenschippers@gmail.com",
                "subject" => "Huren jeugdhuis",
                "message" => "Beste, is het mogelijk om het jeugdhuis af te huren voor een verjaardagsfeestje?",
                "answered" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"name" => "Jeffrey Moorthamer",
                "email" => "jeffreymoorthamer@gmail.com",
                "subject" => "Voetbal op groot scherm",
                "message" => "Hey, zenden jullie de champions league finale uit op groot scherm deze zaterdag?",
                "answered" => 0,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    	];

        DB::table('contact_messages')->insert($contactMessages);
    }
}

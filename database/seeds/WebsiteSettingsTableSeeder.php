<?php

use Illuminate\Database\Seeder;

class WebsiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
    		[
    			"cover_photo" => "background.JPG",
    		]
    	];

        DB::table('website_settings')->insert($settings);
    }
}

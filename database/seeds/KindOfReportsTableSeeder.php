<?php

use Illuminate\Database\Seeder;

class KindOfReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kind_of_reports= [
        	[
        		"name" => "kernverslag"
        	],
        	[
        		"name" => "activiteitenverslag"
        	],
        	[
        		"name" => "ander"
        	],
        ];

        DB::table('kind_of_reports')->insert($kind_of_reports);
    }
}

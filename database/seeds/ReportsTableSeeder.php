<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reports = [
    		[
    			"name" => "Kernvergadering juni",
                "file_path" => "uploads/reports/kernverslag/kernverslagjuni.docx",
                "date" => date("Y-m-d",strtotime("2017-08-15")),
                "kind_of_report" => "kernverslag",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"name" => "Kernvergadering mei",
                "file_path" => "uploads/reports/kernverslag/kernverslagmei.docx",
                "date" => date("Y-m-d",strtotime("2017-08-15")),
                "kind_of_report" => "kernverslag",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"name" => "Activiteitenvergadering juni",
                "file_path" => "uploads/reports/activiteitenverslag/activiteitenverslagjuni.docx",
                "date" => date("Y-m-d",strtotime("2017-08-15")),
                "kind_of_report" => "activiteitenverslag",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"name" => "headAdmin",
                "file_path" => "uploads/reports/ander/RVBverslagjuni.docx",
                "date" => date("Y-m-d",strtotime("2017-08-15")),
                "kind_of_report" => "ander",
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    	];

        DB::table('reports')->insert($reports);
    }
}

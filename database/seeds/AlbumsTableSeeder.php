<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AlbumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $albums = [
    		[
    			"album_name" => "Het vernieuwde jeugdhuis",
                "title_url" => "Het-vernieuwde-jeugdhuis",
                "date" => date("Y-m-d", strtotime("2017-06-18")),
                "publish" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"album_name" => "9150 BEATS foto's",
                "title_url" => "9150-BEATS-fotos",
                "date" => date("Y-m-d", strtotime("2017-06-18")),
                "publish" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    	];

    	$photos = [
    		[
    			"album_id" => 1,
    			"photo" => "Photo1.JPG",
    		],
    		[
    			"album_id" => 1,
    			"photo" => "Photo2.JPG",
    		],
    		[
    			"album_id" => 1,
    			"photo" => "Photo3.JPG",
    		],
    		[
    			"album_id" => 1,
    			"photo" => "Photo4.JPG",
    		],
    		[
    			"album_id" => 2,
    			"photo" => "Photo1.JPG",
    		],
    		[
    			"album_id" => 2,
    			"photo" => "Photo2.JPG",
    		],
    		[
    			"album_id" => 2,
    			"photo" => "Photo3.JPG",
    		],
    		[
    			"album_id" => 2,
    			"photo" => "Photo4.JPG",
    		],
    		[
    			"album_id" => 2,
    			"photo" => "Photo5.JPG",
    		],
    	];

    	$album_events = [
    		[
    			"album_id" => 2,
    			"event_id" => 2
    		]
    	];

    	DB::table('album_event')->insert($album_events);
    	DB::table('event_photos')->insert($photos);
        DB::table('albums')->insert($albums);
    }
}

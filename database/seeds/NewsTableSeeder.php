<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news = [
    		[
    			"title" => "De nieuwe Ter Walle website!",
                "title_url" => "De-nieuwe-Ter-Walle-website",
                "text" => "Hier is hij dan, de nieuwe website van ons jeugdhuis. Je kan hier de verschillende evenementen van het jeugdhuis, foto's en nieuwtjes die te maken hebben met het jeugdhuis bekijken. Vanaf nu kan je hier ook geraken aan voorverkoop tickets voor bepaalde evenementen en heb je zelfs de kans om er te winnen!",
                "subtitle" => "Hij is er eindelijk de gloednieuwe website van Jeugdhuis Ter Walle, terug van een lange tijd weg geweest!",
                "cover_photo" => "NewsBackground1.png",
                "publish" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		[
    			"title" => "Nieuw bier",
                "title_url" => "Nieuw-bier",
                "text" => "Zoals velen van jullie waarschijnlijk wel al hadden gehoord, gaat ons jeugdhuis veranderen van pils. We nemen dus afscheid van Estaminet die na jarenlang dienst op pensioen mag gaan. Vanaf 1 juli mogen jullie de smakkelijke Stella premium pils van AB Inbev verwelkomen. Met deze wijziging in pils komt ook een kleine prijs verandering mee. Een pint bier zal nu €1,50 kosten in plaats van €1,40. We hopen jullie 1 juli te mogen ontvangen om Stella een spetterend welkomsfeestje te geven!",
                "subtitle" => "Jullie hebben het zeer goed gelezen, Jeugdhuis Ter Walle veranderd vanaf deze zomer van pils.",
                "cover_photo" => "NewsBackground2.png",
                "publish" => 1,
    			"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		],
    		// [
    		// 	"title" => "headAdmin",
      //           "title_url" => "head admin",
      //           "text" => "",
      //           "subtitle" => "",
      //           "cover_photo" => "",
      //           "publish" => 0,
    		// 	"created_at" => Carbon::now()->format('Y-m-d H:i:s')
    		// ],
    	];

        DB::table('news')->insert($news);
    }
}

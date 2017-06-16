<?php

use Illuminate\Database\Seeder;

class CoreMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $core_members = [
    		[
    			"user_id" => 1,
    			"function" => "Grafische ondersteuning"
    		],
    		[
    			"user_id" => 2,
    			"function" => "Hygiënisch verantwoordelijke"
    		],
    		[
    			"user_id" => 3,
    			"function" => "Verantwoordelijke gebouw"
    		],
    		[
    			"user_id" => 4,
    			"function" => "Voorzitter dagelijkse werking"
    		],
    		[
    			"user_id" => 5,
    			"function" => "Bestellingen en communicatie verantwoordelijke"
    		],
    		[
    			"user_id" => 6,
    			"function" => "Penningmeester en Chiro verantwoordelijke"
    		],
    		[
    			"user_id" => 7,
    			"function" => "Hoofdverantwoordelijke activiteiten"
    		],
    		[
    			"user_id" => 8,
    			"function" => "Inventaris verantwoordelijke"
    		],
    		[
    			"user_id" => 9,
    			"function" => "Financieel verantwoordelijke"
    		],
    		[
    			"user_id" => 10,
    			"function" => "Supplies verantwoordelijke"
    		],
    	];

        DB::table('core_members')->insert($core_members);
    }
}

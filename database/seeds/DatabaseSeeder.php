<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        // $this->call(EventsTableSeeder::class);
        $this->call(WebsiteSettingsTableSeeder::class);
        $this->call(CoreMembersTableSeeder::class);
    }
}

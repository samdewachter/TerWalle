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
        $this->call(EventsTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(ContactMessagesTableSeeder::class);
        $this->call(GroceriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PollsTableSeeder::class);
        $this->call(PresaleTableSeeder::class);
        $this->call(ReportsTableSeeder::class);
        $this->call(TapperTableSeeder::class);
        $this->call(WebsiteSettingsTableSeeder::class);
        $this->call(CoreMembersTableSeeder::class);
    }
}

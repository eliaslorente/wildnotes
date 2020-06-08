<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EventSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(NoteSeeder::class);
        $this->call(NoteTagSeeder::class);
    }
}

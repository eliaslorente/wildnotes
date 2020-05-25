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
        $this->call(TagSeeder::class);
        $this->call(NoteSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(UserSeeder::class);
    }
}

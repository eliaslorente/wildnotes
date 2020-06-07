<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
            'name' => 'Elias',
            'email' => 'elias@gmail.com',
            'role_id' => 1,
            'isAdmin' => true,
            'password' => Hash::make('123123')
        ]);

      DB::table('users')->insert([
          'name' => Str::random(10),
          'email' => Str::random(10).'@gmail.com',
          'role_id' => 2,
          'password' => Hash::make('password')
      ]);
    }
}

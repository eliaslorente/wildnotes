<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
              'name' => 'Azul',
              'class' => 'info',
              'hexadecimal' => '#00bcd4'
          ]);

        DB::table('colors')->insert([
            'name' => 'Verde',
            'class' => 'success',
            'hexadecimal' => '#4caf50'
        ]);

        DB::table('colors')->insert([
              'name' => 'Naranja',
              'class' => 'warning',
              'hexadecimal' => '#ff9800'
          ]);
          
        DB::table('colors')->insert([
              'name' => 'Rojo',
              'class' => 'danger',
              'hexadecimal' => '#F44336'
          ]);

    }
}

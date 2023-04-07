<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //creacion de los tipos de participantes
      \DB::table('participants_types')->insert(
        [
          [
            'name' => 'devOps',
            'description' => 'es el encargado de hacer los deploys ', 
          ],
          [
            'name' => 'observador',
            'description' => 'es el encargado de observar', 
          ]
        ]
      );       //
    }
}

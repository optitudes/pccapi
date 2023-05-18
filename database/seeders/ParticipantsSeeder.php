<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //creacion de los  participantes
      \DB::table('participants')->insert(
        [
          [
            'participant_type_id' => 1,
            'user_id' =>1, 
          ],
          [
            'participant_type_id' => 2,
            'user_id' =>2, 
          ]
        ]
      ); 
    }
}

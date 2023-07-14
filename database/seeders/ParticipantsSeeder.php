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
            'participants_type_id' => 1,
            'user_id' =>1, 
          ],
          [
            'participants_type_id' => 2,
            'user_id' =>2, 
          ],
          [
            'participants_type_id' => 3,
            'user_id' =>3, 
          ],
          [
            'participants_type_id' => 4,
            'user_id' =>4, 
          ],
          [
            'participants_type_id' => 3,
            'user_id' =>4, 
          ]

        ]
      ); 
    }
}

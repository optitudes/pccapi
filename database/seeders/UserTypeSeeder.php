<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //creating user types
      \DB::table('user_types')->insert(
        [
          [
            'description' => 'admin', 
            'level_access' => '0', 
          ],
          [
            'description' => 'normal', 
            'level_access' => '1', 
          ]
        ]
      );
    }
}

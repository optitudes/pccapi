<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
      //creating user types
      \DB::table('users')->insert(
        [
          [
            'name' => 'mayler', 
            'email' => 'mayler@gmail.com',
            'password' => bcrypt('1234') ,
            'city' => 'tebaida' ,
            'user_type_id' => '1'
          ],
          [
            'name' => 'sebas', 
            'email' => 'sebas@gmail.com',
            'password' => bcrypt('1234') ,
            'city' => 'armenia' ,
            'user_type_id' => '2'
          ],
          [
            'name' => 'sharon', 
            'email' => 'sharon@gmail.com',
            'password' => bcrypt('1234') ,
            'city' => 'calarca' ,
            'user_type_id' => '2'
          ],
          [
            'name' => 'optitudes', 
            'email' => 'optt@gmail.com',
            'password' => bcrypt('1234') ,
            'city' => 'calarca' ,
            'user_type_id' => '1'
          ],
        ]
      );
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        \DB::table('videos')->insert([
            [
              "title" => "loros que hablan",
              "description" => "Un compilado de tres loros que hablan y son unicos del quindio",
              "link" => "https://www.youtube.com/watch?v=SCojIEuR9us",
              'project_id' => 1,
            ],
            [
                "title" => "loro cantando",
                "description" => "Un loro endemico del quindio que por su naturaleza puede aprender a cantar",
                "link" => "https://www.youtube.com/watch?v=amrJc9_iBPQ",
                'project_id' => 1,
              ],
          ]);
    }
}

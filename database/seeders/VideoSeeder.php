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
              "link" => "SCojIEuR9us",
              "banner" => "https://qph.cf2.quoracdn.net/main-qimg-0668e37561c1b1c4aa78d401ea7d1335-lq",
              'project_id' => 1,
              'created_at' => "2022-01-01",
            ],
            [
                "title" => "loro cantando",
                "description" => "Un loro endemico del quindio que por su naturaleza puede aprender a cantar",
                "link" => "amrJc9_iBPQ",
                "banner" => "https://img.point.pet/images/close-up-of-parrot-909966118-5b67b41bc9e77c007bb09fe6.jpg",
                'project_id' => 1,
              'created_at' => "2022-01-01",
              ],
          ]);
    }
}

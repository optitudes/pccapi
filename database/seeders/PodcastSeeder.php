<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('podcasts')->insert([
            [
              "title" => "historia de los loros que hablan",
              "description" => "Una narración de la bióloga julieta venegas  donde se expone la naturaleza oculta de los loros del quindio",
              "link" => "https://www.youtube.com/watch?v=_DOVV9EbI2k",
              'project_id' => 1,
            ],
            [
                "title" => "Acercamiento a la musica y el canto de las aves del quindío",
                "description" => "Juan sebastian nos expone la relación casi intrinseca entre el canto del loro coroniazul",
                "link" => "https://www.youtube.com/watch?v=vo5uPDx6CHI",
                'project_id' => 1,
              ],
          ]);
    }
    
}

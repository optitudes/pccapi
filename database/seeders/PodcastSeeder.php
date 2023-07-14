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
              "banner" => "https://i.etsystatic.com/14966180/r/il/4893f6/1259760765/il_1588xN.1259760765_sdn3.jpg",
              'project_id' => 1,
              'created_at' => "2022-01-01",
            ],
            [
                "title" => "Acercamiento a la musica y el canto de las aves del quindío",
                "description" => "Juan sebastian nos expone la relación casi intrinseca entre el canto del loro coroniazul",
                "link" => "https://www.youtube.com/watch?v=vo5uPDx6CHI",
                "banner" => "https://letraslibres.com/wp-content/uploads/2020/08/loro%20del%20rin.jpg",
                'project_id' => 1,
              'created_at' => "2022-01-01",
              ],
          ]);
    }
    
}

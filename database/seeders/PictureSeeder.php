<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pictures')->insert([
            [
              "title" => "loros orejiamarillo",
              "description" => "El loro orejiamarillo es muy conocido por sus colores, canto y tamaño siendo uno de los más populares del pcc",
              "link" => "https://caracol.com.co/resizer/64WSR714FAxVHbtVeh-CvlPt5PQ=/650x488/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/prisaradioco/GUY5A47GBVPYLJGXKWY67NEQWI.jpg",
              'project_id' => 1,
            ],
            [
                "title" => "loro orejiamarillo reposando",
                "description" => "En esta foto se puede apreciar un loro orejiamarillo reposando",
                "link" => "https://upload.wikimedia.org/wikipedia/commons/2/25/Ognorhynchus_icterotis_-Colombia-8.jpg",
                'project_id' => 1,
            ],
            [
              "title" => "Hogar típico",
              "description" => "El hogar de los campesinos de la región, cuna de poetas y cantores",
              "link" => "https://construccionespalacios.com/upload/ckimages/images/img1359.jpg",
              'project_id' => 1,
            ],
            [
              "title" => "Cascada en el Paisaje Cultural Cafetero",
              "description" => "Una cascada natural, parte de un sistema de cascadas hermosas del paisaje cultural cafetero",
              "link" => "https://www.elespectador.com/resizer/2UFF7K6P7cKfuYnSG85w7VA9b_4=/525x350/filters:quality(60):format(jpeg)/cloudfront-us-east-1.images.arcpublishing.com/elespectador/XERXDCSKHFEEDDJFAKHPGKYRGU.jpg",
              'project_id' => 2,
            ],
            [
              "title" => "Proceso de secado del café",
              "description" => "Esta fotografía muestra el proceso de secado del café, donde los granos se extienden en patios para perder la humedad y alcanzar el punto óptimo de secado.",
              "link" => "https://perfectdailygrind.com/wp-content/uploads/2020/11/Coffee-Drying-Guide-2.jpg",
              'project_id' => 2,
            ],
            [
              "title" => "Café colombiano en taza",
              "description" => "En esta foto se muestra una taza de café colombiano, reconocido por su sabor y calidad excepcionales, representando la esencia del Paisaje Cultural Cafetero.",
              "link" => "https://www.infobae.com/new-resizer/14QQwq0JjDIHFqq86S68qaiJd0s=/1440x1080/filters:format(webp):quality(85)/arc-anglerfish-arc2-prod-infobae.s3.amazonaws.com/public/3FI2PE4OHRBCVJGUDQEZKZU3SE.jpg",
              'project_id' => 2,
            ],
            [
              "title" => "Arquitectura colonial en un pueblo cafetero",
              "description" => "Esta imagen retrata la encantadora arquitectura colonial presente en un pueblo cafetero, con sus calles empedradas y casas de colores vivos.",
              "link" => "https://www.olecolombia.com/wp-content/uploads/2017/04/PIJAO-QUINDIO.jpg",
              'project_id' => 2,
            ],
            [
              "title" => "Plantación de café en terrazas",
              "description" => "En esta fotografía se observa una plantación de café en terrazas, una técnica tradicional que permite aprovechar al máximo las pendientes del terreno para cultivar el café.",
              "link" => "https://www.nacion.com/resizer/PooAHgRjesI1sgCcNyy4Gczq3yM=/1440x0/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/gruponacion/JCCWYG5U5JCBBGTJX3FRBNLYTU.jpg",
              'project_id' => 3,
            ],
            [
              "title" => "Festival del Café en el Paisaje Cultural Cafetero",
              "description" => "Esta foto captura la celebración del Festival del Café en el Paisaje Cultural Cafetero, un evento anual que reúne a productores y amantes del café de todo el mundo.",
              "link" => "https://www.cronicadelquindio.com/files/noticias/120160702073736.jpg",
              'project_id' => 3,
            ],
            [
              "title" => "Molino de café tradicional",
              "description" => "En esta imagen se muestra un molino de café tradicional, utilizado para moler los granos y obtener el café en polvo que se disfruta en todo el mundo.",
              "link" => "https://previews.123rf.com/images/alekseypatsyuk/alekseypatsyuk1307/alekseypatsyuk130700006/20991528-molino-de-caf%C3%A9-bolsa-con-granos-de-caf%C3%A9-y-una-taza-de-caf%C3%A9-negro-aislado-en-el-fondo-blanco.jpg",
              'project_id' => 4,
            ],
            [
              "title" => "Colibrí en una flor de café",
              "description" => "En esta imagen se puede apreciar un colibrí alimentándose del néctar de una flor de café, resaltando la importancia de la biodiversidad en el Paisaje Cultural Cafetero.",
              "link" => "https://media-cdn.tripadvisor.com/media/photo-s/18/21/cc/0b/mientras-disfrutas-de.jpg",
              'project_id' => 4,
            ],
            [
              "title" => "Artesanía cafetera tradicional",
              "description" => "Esta foto muestra una artesanía cafetera tradicional, como una canasta tejida a mano o una taza de cerámica decorada, que representa la cultura y tradiciones de la región cafetera.",
              "link" => "https://www2.colombia.travel/sites/default/files/inline-images/Contenedor%20e%20individual_Cesteria.jpg",
              'project_id' => 4,
            ],
            [
              "title" => "Vista panorámica de un pueblo cafetero",
              "description" => "En esta imagen se aprecia una vista panorámica de un encantador pueblo cafetero, rodeado de exuberante vegetación y con las montañas como telón de fondo.",
              "link" => "https://www.sinmapa.net/wp-content/uploads/2018/03/panoramica-salento-eje-cafetero-colombia.jpg",
              'project_id' => 4,
            ],
              
          ]);
    }
}

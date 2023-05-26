<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //creating the projects default
      \DB::table('projects')->insert(
        [
          [
            'name' => 'Loros quindianos y su diversidad', 
            'banner' => 'https://estaticos-cdn.elperiodico.com/clip/9a36bb77-0c88-4b3c-a7dc-f3d41dd85987_alta-libre-aspect-ratio_default_0.jpg',
            'description' => "Este proyecto consiste en una investigación exhaustiva llevada a cabo por los biologos del quindio",
          ],
          [
            'name' => 'Ranas exoticas del quindio',
            'banner' => 'https://imagenes.muyinteresante.es/files/vertical_composte_image/uploads/2022/10/12/6346c8ee3a8c3.jpeg',
            'description' => "Este proyecto consiste en una investigación exhaustiva llevada a cabo por los biologos del quindio",
          ],
          [
            'name' => 'aves del cafe',
            'banner' => 'https://vivirenelpoblado.com/wp-content/uploads/2019/05/Barranquero.jpg',
            'description' => "Explorando la interacción entre el paisaje cafetero y su entorno natural a través de la fotografía y la narrativa visual",
          ],
          [
            'name' => 'CulturaCafé',
            'banner' => 'https://www.procomer.com/wp-content/uploads/Alertas-comerciales-cafe-en-grano.jpg',
            'description' => "Investigando las tradiciones, costumbres y expresiones culturales que rodean el café en la región, desde la cosecha hasta la preparación y el consumo.",
          ],
          [
            'name' => 'CaféVista',
            'banner' => 'https://previews.123rf.com/images/aln23/aln232001/aln23200100056/140127679-granjero-trabajando-en-el-campo-de-caf%C3%A9-al-atardecer-al-aire-libre.jpg',
            'description' => "Analizando los impactos visuales del paisaje cafetero y su influencia en la calidad de vida de las comunidades locales y los visitantes.",
          ],
          [
            'name' => 'PaisajeCafetero',
            'banner' => 'https://www.elespectador.com/resizer/QvIh6FA0zfsvqYWrUy3EQ9VQ-I4=/910x606/filters:quality(70):format(jpeg)/cloudfront-us-east-1.images.arcpublishing.com/elespectador/4H5QBASVQNFD3AD6OENGLELLOI.jpg',
            'description' => "Estudiando la configuración geográfica, la diversidad biológica y los elementos naturales que conforman el icónico paisaje del café.",
          ],
          [
            'name' => 'CaféArte',
            'banner' => 'https://mymodernmet.com/wp/wp-content/uploads/2021/11/spilled-coffee-art-giulia-bernardelli-8.jpg',
            'description' => "nvestigando la representación artística del café a través de la pintura, la escultura, la música y otras formas de expresión artística, y su relación con la cultura cafetera.",
          ],
          [
            'name' => 'CaféConexión',
            'banner' => 'https://nepabuleici.files.wordpress.com/2010/06/5686-fotografia-g.jpg',
            'description' => " Analizando las interacciones sociales, económicas y ambientales generadas por el paisaje cafetero y su influencia en las redes de comercio, turismo y desarrollo sostenible.",
          ]
        ]
      );
    
    }
}

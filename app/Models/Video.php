<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Video extends Model
{
    use HasFactory;
   public function userType(){
      $this->belongsTo('App\Models\Project');
    }

    //Metodo que retorna el titulo, id y link y descripción de los ultimos 6 elementos
    public static function getLast($limit = 6){

      return DB::table('videos')
      ->orderBy('id', 'desc') // Ordenar en orden descendente para obtener los últimos elementos primero
      ->take($limit) // Tomar los últimos seis elementos
      ->select('title','id','link','description','created_at','banner')
      ->get();
    }
}

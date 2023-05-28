<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Picture extends Model
{
    use HasFactory;
    public function project(){
        $this->belongsTo('App\Models\Project');
      }

        //Metodo que retorna el titulo, id y link y descripción de los ultimos 6 elementos
  public static function getLast($limit = 10){

    return DB::table('pictures')
    ->orderBy('id', 'desc') // Ordenar en orden descendente para obtener los últimos elementos primero
    ->take($limit) // Tomar los últimos seis elementos
    ->select('title','id','link','description','created_at')
    ->get();
  }

//metodo que retorna informacion de los elementos que coincidan con una palabra, maximo 15
    public static function  searchPictures($word=""){
      return DB::table('pictures')
      ->where('title','like','%'.$word.'%',)
      ->select('title','id','link','description','created_at')
      ->paginate(7);
    }

}

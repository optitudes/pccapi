<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Podcast extends Model
{
    use HasFactory;

    public function project(){
        return $this->belongsTo('App\Models\Project');
      }

    //Metodo que retorna el titulo, id y link y descripción de los ultimos 6 elementos
    public static function getLast($limit = 10){

      return DB::table('podcasts')
      ->whereNull('deleted_at') // Agregamos esta cláusula para omitir registros con deleted_at diferente de null
      ->orderBy('id', 'desc') // Ordenar en orden descendente para obtener los últimos elementos primero
      ->take($limit) // Tomar los últimos seis elementos
      ->select('title','id','link','description','banner','created_at')
      ->get();
    }

  //metodo que retorna informacion de los elementos que coincidan con una palabra, maximo 15
    public static function  searchPodcasts($word=""){
      return DB::table('podcasts')
      ->where('title','like','%'.$word.'%',)
      ->whereNull('deleted_at') // Agregamos esta cláusula para omitir registros con deleted_at diferente de null
      ->select('title','id','link','description','banner','created_at')
      ->paginate(7);
    }
  //metodo que elimina los  podcast relacionados a un proyecto 
    public static function  deleteByProjectId($idProject = -1){
      return DB::table('podcasts')
      ->where('project_id',$idProject)
      ->update(['deleted_at' => now()]);
    }

}

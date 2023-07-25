<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Project extends Model
{
    use HasFactory;
    public function videos(){
      return $this->hasMany('App\Models\Video');
    }
    public function pictures(){
      return $this->hasMany('App\Models\Picture');
    }
    public function podcast(){
      return $this->hasMany('App\Models\Podcast');
    }
    public function socialNetworks(){
      return $this->hasMany('App\Models\SocialNetworks');
    }
    public function participants (){
     return $this->belongsToMany('App\Models\Participants');
    }

    //Metodo que retorna el nombre, id y banner de los ultimos 6 elementos
    public static function getLast($limit = 6){

      return DB::table('projects')
      ->whereNull('deleted_at') // Agregamos esta cláusula para omitir registros con deleted_at diferente de null
      ->orderBy('id', 'desc') // Ordenar en orden descendente para obtener los últimos elementos primero
      ->take($limit) // Tomar los últimos seis elementos
      ->select('name','id','banner','description','created_at')
      ->get();
    }
    //metodo que retorna informacion de los elementos que coincidan con una palabra, maximo 15
    public static function  searchProjects($word=""){
      return DB::table('projects')
      ->where('name','like','%'.$word.'%',)
      ->whereNull('deleted_at') // Agregamos esta cláusula para omitir registros con deleted_at diferente de null
      ->select('name','id','banner','description','created_at')
      ->paginate(7);
    }
}

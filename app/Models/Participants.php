<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    use HasFactory;
    //metodo que trae el tipo de participante
    public function participantType (){
      return $this->belongsTo(ParticipantsType::class, 'participants_type_id');
    }
    //metodo que trae los proyectos relacionados con el participante
    public function projects (){
      return $this->hasMany('App\Models\Project');
    }
    //metodo que trae la informacion basica de los tipos de participante que posee un usuario
    public static function getParticipantsTypeBasicInfo($userId = -1){
      return \DB::table('users', 'user')->where('user.id',$userId ?? -1)
      ->join('participants as participant','participant.user_id','=','user.id')
      ->join('participants_types as participantType','participantType.id','=','participant.participants_type_id')
      ->select('participantType.name','participantType.description')
        ->get();
      } 
}

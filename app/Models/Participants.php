<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    use HasFactory;
    public function participantTipe (){
      $this->belongsTo('App\Models\ParticipantType');
    }
    public function projects (){
      $this->belongsToMany('App\Models\Project');
    }
}

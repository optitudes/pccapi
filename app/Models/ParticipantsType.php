<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantsType extends Model
{
    use HasFactory;
   public function participants(){
      return $this->hasMany('App\Models\Participants');
    }

}

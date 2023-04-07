<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetworks extends Model
{
    use HasFactory;
 public function socialNetworkName(){
      $this->belongsTo('App\Models\SocialNetworkName');
    }

    public function userType(){
      $this->belongsTo('App\Models\Project');
    }
}

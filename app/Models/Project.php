<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
      $this->belongsToMany('App\Models\Participants');
    }
}

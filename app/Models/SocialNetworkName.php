<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialNetworkName extends Model
{
    use HasFactory;
    public function socialNetworks(){
      return $this->hasMany('App\Models\SocialNetworks');
    }
}

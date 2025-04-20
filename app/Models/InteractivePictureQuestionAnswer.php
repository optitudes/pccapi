<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InteractivePictureQuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer',
        'question_id',
        'author_email'
    ];
    public function author(){
        return $this->belongsTo('App\Models\User','author_email','email');
    }
    public function question(){
        return $this->belongsTo('App\Models\InteractivePictureQuestion','question_id','id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    public $fillable = ['theme','deleted'];

    public function ideas(){
        return $this->hasMany('App\Idea');
    }
}


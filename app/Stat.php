<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = ['idea_id'];

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $fillable = ['score', 'idea_id', 'email'];

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['titre', 'contenu', 'idea_id', 'deleted'];

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }
}

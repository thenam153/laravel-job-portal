<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comments";

    public function project()
    {
        return $this->belongsTo('App\Project', 'project', 'id');
    }
}

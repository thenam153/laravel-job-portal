<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "projects";
    public function user()
    {
        return $this->belongsTo('App\User', 'user', 'id');
    }
    public function files() {
        $this->hasMany('App\Fk_file_projects', 'idProject');
    }
}

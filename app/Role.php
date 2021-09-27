<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $table ="Roles";
    public function user(){
        return $this->hasMany('App\role','idRole','id');

    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table ="Category";

    public function article(){
        return $this->hasMany('App\Article','idCategory','id');
    }
}

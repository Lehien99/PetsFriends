<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table ="Article";

    public function category()
    {
        return $this->belongsTo('App\Article', 'idCategory', 'id');
    }

    public function comment(){
        return $this->hasMany('App\Comment','idTinTuc','id');
    }
}

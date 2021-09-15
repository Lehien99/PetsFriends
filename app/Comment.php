<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table ="Comment";
    public function article()
    {
        return $this->belongsTo('App\Article', 'idArticle', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','idUser','id');
    }
}

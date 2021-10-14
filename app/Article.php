<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    // public $timestamps = false;
    protected $table ="Article";
    

    public function category()
    {
        return $this->belongsTo('App\Category', 'idCategory', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User','idUser','id');
    }


    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    
}

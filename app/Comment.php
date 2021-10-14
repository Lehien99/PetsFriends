<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table ="Comments";

    public function commentable()
    {
        return $this->morphTo();
    }
    
    // public function article()
    // {
    //     return $this->belongsTo('App\Article', 'idArticle', 'id');
    // }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}

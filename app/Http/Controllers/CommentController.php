<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;

class CommentController extends Controller
{
    //
    public function Add(Request $request)
    {
        $comment = new Comment;

        $comment->comment = $request->Comment;

        $comment->user()->associate($request->user());
      
        $article = Article::find($request->article_id);
       
        $article->comments()->save($comment);

        return back();
    }
    public function replyAdd(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');

        $reply->user()->associate($request->user());

        $reply->parent_id = $request->get('comment_id');

        $article =Article::find($request->get('article_id'));

        $article ->comments()->save($reply);

        return back();

    }
}

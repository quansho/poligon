<?php

namespace App\Http\Controllers;

use App\Events\NewComment;
use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index(BlogPost $post)
    {
        return response()->json($post->comments()->with('user')->latest()->get());
    }

    public function store(Request $request, BlogPost $post)
    {
        $comment = $post->comments()->create([
            'body'=>$request->body,
            'user_id'=>Auth::id()
        ]);

        $comment = Comment::where('id', $comment->id)->with('user')->first();


        broadcast(new NewComment($comment))->toOthers();

        return response()->json($comment);
    }
}

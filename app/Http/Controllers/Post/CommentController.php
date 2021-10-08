<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    
    
    public function store(Request $request)
    {
        Comment::create($request->all());
        return redirect()->back();
    }

 

   
    public function update(Request $request, Comment $comment)
    {
        $this->authorize('autor',$comment);
        $comment->update($request->all());
        return redirect()->back();
    }


    public function destroy(Comment $comment)
    {
        $this->authorize('autor',$comment);  
        $comment->delete();
        return redirect()->back();
    }
}

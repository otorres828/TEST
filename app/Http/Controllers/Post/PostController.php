<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status',2)->orderBy('created_at','desc')->paginate(9);
        return view('post.index',compact('posts'));
    }

    public function show($slug){   
        
        $post = Post::where('slug',$slug)->first();
        $this->authorize('publicado',$post); 
        $comments = Comment::where('post_id',$post->id)->get();
        
        $similares = Post::where('status',2)
                            ->where('id','!=',$post->id)
                            ->take(4)
                            ->latest('id')
                            ->get();
                            
        return view('post.show',compact('post','similares','comments'));
    }

    public function category($slug){      
        $categoria = Category::where('slug',$slug)->first();
        $posts = Post::where('category_id',$categoria->id)
                            ->where('status',2)
                            ->orderBy('created_at')
                            ->latest('id')
                            ->paginate(12);
        return view('post.category',compact('categoria','posts'));
    }

    public function user($id){     
        $user = User::find($id); 
        $posts = Post::where('user_id',$id)
                            ->where('status',2)
                            ->orderBy('created_at')
                            ->latest('id')
                            ->paginate(12);
        return view('post.user',compact('posts','user'));
    }

}

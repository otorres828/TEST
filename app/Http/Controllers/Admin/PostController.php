<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  
    public function index()
    {
        $user = User:: find(auth()->user()->id);  
        $roles = $user->getRoleNames();
        if($roles[0]=='Admin'){
            $posts = Post::select('id','name','slug','status')
                            ->latest('id')
                            ->get();
        }else{
            $posts = Post::select('id','name','slug','status')
                            ->where('user_id',auth()->user()->id)
                            ->latest('id')
                            ->get();            
        }                       
        return view('admin.index',compact('posts'));
    }


   
    public function create()
    {
        $categorias = Category::pluck('name','id');
        return view('admin.create',compact('categorias'));    
    }

   

    public function store(PostRequest $request)
    {
        $anuncio= Post::create($request->all());
        if($request->file('file')){
            $image_url=Storage::put('public/post', $request->file('file'));

            $anuncio->image()->create([
                'url'=>$image_url
            ]);            
        }
        return redirect()->route('admin.post.index')->with('info','El Post se creo con exito');
    }



    public function edit(Post $post)
    {
        $this->authorize('autor',$post);
        $categorias = Category::pluck('name','id');
        return view('admin.edit',compact('post','categorias'));
    }

 
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('autor',$post);
        $url="";
        $post->update($request->all());
        if($request->file('file')){
            $url=Storage::put('public/post', $request->file('file'));

            if($post->image){
                Storage::delete($post->image->url);
    
                $post->image->update([
                    'url'=>$url
                ]);
            }else{
                $post->image()->create([
                    'url'=>$url
                ]);  
            }
        }
        return redirect()->route('admin.post.edit',$post)->with('info','Se actualizo la informacion del post');
    }


    public function destroy(Post $post)
    {
        $this->authorize('autor',$post);
        //ELIMINAR IMAGEN ASOCIADA AL POST
        if($post->image){
            Storage::delete($post->image->url);
        }
        $post->delete();
        return redirect()->route('admin.post.index')->with('info','El post se elimino con exito');;
    }
}

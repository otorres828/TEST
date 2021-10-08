@extends('layouts.test')
@section('title','Test Post')

@section('header')
@endsection

@section('main')
    <main class="container mt-4 mb-5">
        <div class="row">     
            <div class="col-12 col-lg-12">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12 col-md-4 mb-4 " >     
                            <div class="card shadow h-100">
                                <img class="image-wraper" src="@if($post->image){{Storage::url($post->image->url)}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt="Card image cap">
                                <div class="card-body ">
                                    <a style="text-decoration:none" href="{{route('post.show_post',$post->slug)}}" class="h4">{{$post->name}}</a>
                                    <p class="text-secondary">{{$post->extract}}</p>
                                </div>
                                <div class="card-footer">
                                    <p class="text-secondary text-center"><small>{{$post->created_at}}</small></p>
                                </div>  
                            </div>
                        </div>                  
                    @endforeach
                </div>
            </div>

        </div>
        
        {{ $posts->links() }}

    </main>    
@endsection

@section('css')

@endsection
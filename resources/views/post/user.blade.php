@extends('layouts.test')
@section('title','Test-Post-User')
@section('header')
@endsection
@section('main')
    <main class="container mt-4 mb-5">
        <div class="row">     
            <div class="alert alert-warning text-center" role="alert">
                <h1>AUTOR: {{ $user->name }}</h1>
            </div>    
            <div class="col-12 col-lg-12">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12 col-md-4 mb-4" >     
                            <div class="card shadow h-100">
                                <img class="image-wraper" src="@if($post->image){{Storage::url($post->image->url)}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt="Card image cap">
                                <div class="card-body ">
                                    <a style="text-decoration:none" href="{{route('post.show_post',$post->slug)}}" class="h4">{{$post->name}}</a>
                                    <p class="text-secondary">{{$post->extract}}</p>
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
<style>
    .image-wraper{
        position: relative;
    }

    .image-wraper img{
        position: absolute;
        object-fit: cover;
        width: 100px;
        height: 20%;
    }
</style>  
@endsection
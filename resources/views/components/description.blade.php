@props(['post'])

<section style="background-color:#243652" class="bg-oscuro mb-4">
    <div class="container">
        <div class="row align-items-center py-5">
            <div class="col">
                <div class="card-img">
                    <img width="100%" src="@if($post->image){{Storage::url($post->image->url)}}@else https://pbs.twimg.com/profile_images/740993726189834240/WbUqIPMS.jpg @endif" alt="" class="rounded">
                </div>
            </div>
            <div class="col-12 col-lg-7 col-xl-6 text-white">
                <h1 class="h2 mt-3 mt-lg-0">{{$post->name}}</h1>
                <p>
                    <i class="fas fa-chart-line"></i>
                    Fecha de Publicacion: {{$post->created_at}}
                </p>
                <p>
                    <i class="far fa-calendar-alt"></i>
                    Categoria: <a href="{{route('post.category_post',$post->category->slug)}}">{{$post->category->name}}</a>
                </p>
                <p>
                    <i class="fas fa-users"></i>
                    Extracto:  {{$post->extract}}
                </p>

                <p>
                    <i class="far fa-star"></i>
                    Autor: <a href="{{route('post.user_post',$post->user_id)}}"> {{$post->user->name}}</a>
                </p>
        
            </div>
        </div>
    </div>
</section>
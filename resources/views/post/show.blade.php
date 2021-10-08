@extends('layouts.test')

@section('main')
    <x-description :post="$post" />

    <div class="container">
        <div class="col-md-10 mx-auto pt-3 pb-1">
            <article>
                <div class="row">
                    {!! $post->body !!}
                </div>
            </article>
        </div>
    </div>

    <div class="container mt-4" >
        <div class="col-md-11 mx-auto rounded-3" style="background-color:#F5F5F5 ">
            @foreach ($comments as $comment)
                    <div class="card-header mb-4">
                        <small><strong>{{$comment->user->name}}</strong></small> {{$comment->created_at}}
                        <br>
                        {{$comment->message}}
                        <br>
                            <div class="container d-flex">
                                @if (auth()->user()->id==$comment->user_id)

                                     <a data-bs-toggle="modal" data-bs-target="#exampleModal{{$comment->id}}" class="btn btn-primary m-1" href="{{route('admin.post.edit',$post)}}">Editar</a>
                                @endif 
                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$comment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    {!! Form::model($comment,['route'=>['post.comment.update',$comment],'autocomplete'=>'off','files'=>true,'method'=>'put']) !!}
                                                        {!! Form::hidden('user_id', auth()->user()->id) !!} 
                                                        {!! Form::hidden('post_id', $post->id) !!} 
                                                        {!! Form::textarea('message', null, ['class'=>'mb-2 form-control','placeholder'=>'Ingrese un comentario']) !!}           
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                        {!! Form::submit('Actualizar Comentario', ['class'=>'btn btn-primary']) !!}                                            
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  --}}
                                @if (auth()->user()->id==$comment->user_id || auth()->user()->id==$post->user_id)
                                    <form action="{{route('post.comment.destroy',$comment)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger m-1">Eliminar</button>
                                    </form>
                                @endif
                            </div>                               
                         
                    </div>

            @endforeach
            {!! Form::open(['route'=>'post.comment.store','autocomplete'=>'off']) !!}
                {!! Form::hidden('user_id', auth()->user()->id) !!} 
                {!! Form::hidden('post_id', $post->id) !!} 
                {!! Form::textarea('message', null, ['class'=>'mb-2 form-control','placeholder'=>'Ingrese un comentario']) !!}           
                {!! Form::submit('Publicar Comentario', ['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
    </div>

    <div class="container mt-4" >
        <div class="col-md-11 mx-auto rounded-3" style="background-color:#F5F5F5 ">
                <div class="row pt-3 pb-1 text-center">
                     <h2>También te puede interesar</h2>
                </div>
                @foreach ($similares as $similar)
                    <div class="row pb-3 pt-3" style="cursor:pointer" onclick="location.href='{{route('post.show_post',$similar->slug)}}'">
                        <div class="col-md-6  text-center">
                            <a href="{{route('post.show_post',$similar->slug)}}">
                                <img width="457" height="238"
                                    src="{{Storage::url($similar->image->url)}}"
                                    class="img-fluid" alt="" loading="lazy"> </a>
                        </div>
                        <div class="col-md-5 ">
                            <h3 > <a href="{{route('post.show_post',$similar->slug)}}"  style="text-decoration: none">{{$similar->name}}</a></h3>
                            <p class="text-secondary">{!!$similar->extract!!}</p>
                            
                        </div>
                        
                    </div>                
                @endforeach           

                <div class="row text-center pt-4 ">
                    <a href="{{route('post.index')}}" class="mx-auto h3" style="text-decoration: none">Ver Más Post</a>
                </div>   
        </div>
    </div>
    <br>

@endsection


@section('js')
    <x-scrip/>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
@stop
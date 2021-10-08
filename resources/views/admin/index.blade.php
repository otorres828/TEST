@extends('adminlte::page')

@section('title', 'List of Post')

@section('content_header')
    <h1>Lista de Post</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4><strong>{{session('info')}}</strong></h4>
    </div>
    @endif
    <div class="mb-3">
        <a class="btn btn-primary " href="{{route('admin.post.create')}}">Crear Post</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#id</th>
                        <th scope="col">Titulo del Post</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Ver Post</th>
                        <th colspan="col">Editar</th>
                        <th colspan="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td class="text-center">{{$post->id}}</td>
                        <td>{{$post->name}}</td>
                        <td class="text-center">@if ($post->status==1) BORRADOR @else <strong>PUBLICADO</strong> @endif</td>
                        <td class="text-center"><a class=" btn btn-warning text-center"href="{{route('post.show_post',$post->slug)}}">VER</a></td>
                        <td width="10px" class="text-center">
                            <a class="btn btn-primary" href="{{route('admin.post.edit',$post)}}"><i class="far fa-edit"></i></a>
                        </td>
                        <td width="10px" class="text-center">
                            <form action="{{route('admin.post.destroy',$post)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>                           
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <x-scrip/>
@stop
@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Listado de Categoria</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4><strong>{{session('info')}}</strong></h4>
    </div>
@endif
    <div class="mb-3">
        <a class="btn btn-primary" href="{{route('admin.category.create')}}">Agregar Categoria</a>
    </div>
    <div class="card">
        <div class="card-body">

            <table>
                <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <th scope="col">#ID</th>
                        <th scope="col">NOMBRE</th>
                        <th colspan="col">Editar</th>
                        <th colspan="col">Eliminar</th>
                    </thead>
    
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td width="10px" class="text-center">
                                    <a class="btn btn-primary" href="{{route('admin.category.edit',$category)}}"><i class="far fa-edit"></i></a>
                                </td>
                                <td width="10px" class="text-center">
                                    <form action="{{route('admin.category.destroy',$category)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>            
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
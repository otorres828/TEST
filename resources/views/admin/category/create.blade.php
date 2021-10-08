@extends('adminlte::page')

@section('title', 'Crear Categoria')

@section('content_header')
    <h1 class=" mt-2"><strong>REGISTRE NUEVA CATEGORIA</strong></h1>
@stop

@section('content')
    
<div class="card">
    <div class="card-body">
        {!! Form::open(['route'=>'admin.category.store','autocomplete'=>'off']) !!}
            <div class="form-group">
                {!! Form::label('name', 'NOMBRE DE LA CATEGORIA',) !!}
                {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre Categoria']) !!}           
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'SLUG',) !!}
                {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'SLUG','readonly']) !!}
                @error('slug')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            {!! Form::submit('Crear Categoria', ['class'=>'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>

    <script src="{{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}}"></script>

    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
    </script>
@stop

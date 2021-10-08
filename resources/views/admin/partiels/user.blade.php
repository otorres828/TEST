<div class="form-group">
    {!! Form::label('name', 'Nombre Completo') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del contenido']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>
{{-- 
<div class="form-group">
    {!! Form::label('country_id', 'Pais de Origen') !!}
    {!! Form::select('country_id', $countries, null, ['class'=>'form-control']) !!}
    @error('country_id')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div> --}}



<div class="form-group">
    {!! Form::label('email', 'correo electronico') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese su correo electronico']) !!}
    @error('email')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    {!! Form::label('password', 'Clave') !!}
    {!! Form::text('password', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del contenido']) !!}
    @error('password')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>



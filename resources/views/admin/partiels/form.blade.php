<div class="form-group">
    {!! Form::label('name', 'Nombre del Contenido') !!}
    {!! Form::text('name', null, ['class'=>'form-control','placeholder'=>'Ingrese el nombre del contenido']) !!}
    @error('name')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug del Contenido') !!}
    {!! Form::text('slug', null, ['class'=>'form-control','placeholder'=>'SLUG','readonly']) !!}
    @error('slug')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Categoria') !!}
    {!! Form::select('category_id', $categorias, null, ['class'=>'form-control']) !!}
    @error('category_id')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>


<div class="form-group">
    <p class="font-weight-bold">Estado</p>
    <label>
        {!! Form::radio('status', 1, true) !!}
        Borrador
    </label>
   <label>
        {!! Form::radio('status', 2) !!}
        Publicar
    </label>          
  
        
</div>

<div class="row mb-3">
    <div class="col-3">
        <div class="image-wraper">
            @isset($post->image)
                <img id="picture "src="{{Storage::url($post->image->url)}}" alt="">       
            @else
                <img src="https://scontent-mia3-2.xx.fbcdn.net/v/t39.30808-6/241288561_10208648749053105_118200884147147301_n.jpg?_nc_cat=102&ccb=1-5&_nc_sid=09cbfe&_nc_ohc=ofFQBwG9Xm0AX-IGOiM&_nc_ht=scontent-mia3-2.xx&oh=4a84198bb9b139d4180151d7b87c614d&oe=61628F20" alt="">                
            @endisset
        </div>
    </div>

    <div class="col-9">
        <div class="form-group">
            {!! Form::label('file', 'imagen que se mostrara en el Contenido') !!}
            {!! Form::file('file', ['class'=>'form-control-file','accept'=>'image/*']) !!}
            @error('file')
                 <span class="text-danger">{{$message}}</span>
             @enderror                        
        </div>
    </div>
</div>

<div class="form-group">
    {!! Form::label('extract', 'Extracto del Contenido') !!}
    {!! Form::text('extract', null, ['class'=>'form-control'])  !!}
    @error('extract')
        <span class="text-danger">{{$message}}</span>
     @enderror               
</div>

<div class="form-group">
    {!! Form::label('body', 'Cuerpo del Contenido') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control'])  !!}
    @error('body')
        <span class="text-danger">{{$message}}</span>
     @enderror
</div>
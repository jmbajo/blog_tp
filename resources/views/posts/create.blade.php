@extends('layouts.app')

@section('content')
<h1> Crear Entrada Blog</h1>

{!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method'=> 'POST', 'enctype' => 'multipart/form-data']) !!}

  <div class="form-group">
      {{Form::label('titulo', 'Titulo' ) }}
      {{Form::text('titulo', '', ['class' => 'form-control', 'placeholder'=>'Titulo']) }}
  </div>

  <div class="form-group">
      {{Form::label('contenido', 'Contenido' ) }}
      {{Form::textarea('contenido', '', ['class' => 'form-control', 'placeholder'=>'Ingrese texto de la nueva entrada...']) }}
  </div>

  <div class="form-group">
      {{Form::file('portada') }}
  </div>

    {{ Form::submit("Guardar", ['class'=> 'btn btn-primary']) }}

{!! Form::close() !!}

@endsection

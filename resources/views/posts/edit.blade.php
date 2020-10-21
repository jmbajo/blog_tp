@extends('layouts.app')

@section('content')
<h1> Editar Entrada Blog</h1>

{!! Form::open(['action' => ['App\Http\Controllers\PostsController@update', $post->id], 'method'=> 'PUT']) !!}

  <div class="form-group">
      {{Form::label('titulo', 'Titulo' ) }}
      {{Form::text('titulo', $post->titulo, ['class' => 'form-control', 'placeholder'=>'Titulo']) }}
  </div>

  <div class="form-group">
      {{Form::label('contenido', 'Contenido' ) }}
      {{Form::textarea('contenido', $post->contenido, ['class' => 'form-control', 'placeholder'=>'Ingrese texto de la nueva entrada...']) }}
  </div>

    {{ Form::submit("Guardar", ['class'=> 'btn btn-primary']) }}

{!! Form::close() !!}

@endsection

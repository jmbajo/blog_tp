@extends('layouts.app')

@section('content')
<h1> Post: {{$post->titulo}} </h1>


<p> {{$post->contenido}} </p>


@if (!Auth::guest())
  @if(Auth::user()->id == $post->user_id)

    <a href="/posts/{{$post->id}}/edit">Editar entrada...</a>
    <img src="/storage/portadas/{{$post->path_imagen}}">

    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method'=> 'DELETE']) !!}
      {{ Form::submit("Eliminar!") }}
    {!! Form::close() !!}

  @endif

@endif


@endsection

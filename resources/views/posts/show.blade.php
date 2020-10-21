@extends('layouts.app')

@section('content')
<h1> Post: {{$post->titulo}} </h1>


<p> {{$post->contenido}} </p>

<a href="/posts/{{$post->id}}/edit">Editar entrada...</a>

{!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy', $post->id], 'method'=> 'DELETE']) !!}
  {{ Form::submit("Eliminar!") }}
{!! Form::close() !!}

@endsection

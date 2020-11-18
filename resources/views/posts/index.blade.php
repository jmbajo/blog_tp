@extends('layouts.app')

@section('content')
<h1> Posts </h1>

@if(count($posts) > 0)
    @foreach($posts as $post)
      <div class="row">
          <div class="col-md-4">
            <img style="width: 100%" src="/storage/portadas/{{$post->path_imagen}}">
          </div>

          <div class="col-md-8">
            <div class="card">
                <h3> <a href="/posts/{{$post->id}}"> {{ $post->titulo }} </a></h3>
                <p> {{$post->contenido}}</p>
            </div>
          </div>

      </div>


    @endforeach
@endif


@endsection

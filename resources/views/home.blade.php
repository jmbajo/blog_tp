@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                          <div class="card">
                              <h3> <a href="/posts/{{$post->id}}"> {{ $post->titulo }} </a></h3>
                              <p> {{$post->contenido}}</p>
                          </div>
                        @endforeach
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

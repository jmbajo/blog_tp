<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth', ["except" => ["index", "show"]]);
  }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'titulo' => 'required',
          'contenido' => 'required',
        ]);

        $post = new Post();
        $post->titulo = $request->input('titulo');
        $post->contenido = $request->input('contenido');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with("success", "Post Creado Exitosamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view("posts.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id !== $post->user_id)
          return redirect("/posts")->with("error", "Acceso no autorizado");
        else
          return view("posts.edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'titulo' => 'required',
          'contenido' => 'required',
        ]);

        $post = Post::find($id);
        $post->titulo = $request->input('titulo');
        $post->contenido = $request->input('contenido');
        $post->save();

        return redirect('/posts')->with("success", "Post Actualizado Exitosamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->delete();

      return redirect('/posts')->with("success", "Post Eliminado Exitosamente");
    }
}

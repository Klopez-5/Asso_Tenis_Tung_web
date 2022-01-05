<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Symfony\Component\Translation\Dumper\PoFileDumper;

class PostsController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('/admin/posts/index',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/posts/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            //Validar los datos que se recibe
        $data = request()->validate([
            'title'=> 'required',
            'image'=>'required|image',
            'post_content'=>'required',
        ]);

            //Codigo para guardar la ruta de la  imagen
        $fileNameWithTheExtension = request('image')->getClientOriginalName();
        //Se optine el nombre del archivo
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        //Se guarda en una variable la extension de la imagen
        $extension = request('image')->getClientOriginalExtension();
        //Se le cambia el nombre de la imagen.
        $newFileName = $fileName.'_'.time().'.'.$extension;
        //Se va a crear una ruta para poder guardar ahi las imagenes.
        $path = request('image')->storeAs('public/images/posts_images',$newFileName);

            //Codigo para guardar los datos
        $user = auth()->user();//Recuper al Usuario que esta logeado
        $post = new Post();
        $post->title = request('title');
        $post->content = request('post_content');
        $post->image_url = $newFileName;
        $post->user_id = $user->id;

        $post->save();

        return redirect('post');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //Crear una variable para poder editar lo que contiene
        $post = Post::find($post->id);
        return view('/admin/posts/edit',['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //Validar los datos que se recibe
        $data = request()->validate([
            'title'=> 'required',
            'image'=>'image',
            'post_content'=>'required',
        ]);

        //Codigo para guardar los datos
        $user = auth()->user();//Recuper al Usuario que esta logeado
        $post = Post::findOrFail($post->id);


        if(request('image')){
            //Codigo para guardar la ruta de la  imagen
            $fileNameWithTheExtension = request('image')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
            //Se guarda en una variable la extension de la imagen
            $extension = request('image')->getClientOriginalExtension();
            //Se le cambia el nombre de la imagen.
            $newFileName = $fileName.'_'.time().'.'.$extension;
            //Se va a crear una ruta para poder guardar ahi las imagenes.
            $path = request('image')->storeAs('public/images/posts_images',$newFileName);

            //Se actualiza solo en el caso de que se cambie la imagen, caso contrario no va a cambiar,
            // por eso se le agrega dentro del if, y no a fuera como los otros parametros.
            $post->image_url = $newFileName;
        }

        $post->title = request('title');
        $post->content = request('post_content');
        $post->user_id = $user->id;

        $post->save();

        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request->post_id);
        //Codigo para borrar tambien las imagenes de la carpeta.
        $oldImage = public_path().'/storage/images/posts_images/'.$post->image_url;
        if(file_exists($oldImage)){
            unlink($oldImage);
        }
        //Se borra el contenido de la base de datos.
        $post->delete();

        return redirect('/ post');
    }
}

<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
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
        $levels = Level::all();

        return view('/admin/levels/index',['levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/levels/create');
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
        ]);

        //Codigo para guardar los datos
        $level = new Level();
        $level->title = request('title');
        $level->save();

        return redirect('/levels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //Crear una variable para poder editar lo que contiene
        $level = Level::find($level->id);
        return view('/admin/levels/edit',['level' => $level]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        //Validar los datos que se recibe
        $data = request()->validate([
            'title'=> 'required',
        ]);

        //Codigo para guardar los datos
        $level = Level::findOrFail($level->id);

        $level->title = request('title');

        $level->save();

        return redirect('/levels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $level = Level::find($request->level_id);
        //Se borra el contenido de la base de datos.
        $level->delete();

        return redirect('/levels');
    }
}

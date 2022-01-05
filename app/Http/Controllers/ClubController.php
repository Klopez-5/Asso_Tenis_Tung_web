<?php

namespace App\Http\Controllers;

use App\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
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
        $clubs = Club::all();

        return view('/admin/clubs/index',['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/clubs/create');
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
            'name'=> 'required',
        ]);

        //Codigo para guardar los datos
        $club = new Club();
        $club->name = request('name');
        $club->save();

        return redirect('/clubs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //Crear una variable para poder editar lo que contiene
        $club = Club::find($club->id);
        return view('/admin/clubs/edit',['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //Validar los datos que se recibe
        $data = request()->validate([
            'name'=> 'required',
        ]);

        //Codigo para guardar los datos
        $club = Club::findOrFail($club->id);

        $club->name = request('name');

        $club->save();

        return redirect('/clubs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $club = Club::find($request->club_id);
        //Se borra el contenido de la base de datos.
        $club->delete();

        return redirect('/clubs');
    }
}

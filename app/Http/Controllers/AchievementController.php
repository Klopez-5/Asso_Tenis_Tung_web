<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AchievementController extends Controller
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

        $user = auth()->user();//Recuper al Usuario que esta logeado
        //$usu = User::findOrFail($user->id);
        $tablee=null;
        //if($usu->roles[0]->id == 1){
            $achievements = Achievement::all();
           // $tablee=1;
       // }else{
            $achievementsmy = Achievement::where('user_id',$user->id)->get();
           // $tablee=0;
       // }
        return view('/admin/achievements/index',['achievements' => $achievements, 'achievementsmy' => $achievementsmy,'tablee'=>$tablee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();//Recuper al Usuario que esta logeado
        $achievementsmy = Achievement::where('user_id',$user->id)->get();
        return view('/admin/achievements/create',['achievementsmy' => $achievementsmy]);
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
            'description'=>'required',
        ]);

        //Codigo para guardar los datos
        $user = auth()->user();//Recuper al Usuario que esta logeado
        $achievement = new Achievement();
        $achievement->name = request('name');
        $achievement->description = request('description');
        $achievement->user_id = $user->id;
        $achievement->save();
        Alert::toast('Logro registrado','success');
        return redirect('/achievements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function show(Achievement $achievement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function edit(Achievement $achievement)
    {
        $user = auth()->user();//Recuper al Usuario que esta logeado
        $achievementsmy = Achievement::where('user_id',$user->id)->get();
        //Crear una variable para poder editar lo que contiene
        $achievement = Achievement::find($achievement->id);
        return view('/admin/achievements/edit',['achievement' => $achievement, 'achievementsmy' => $achievementsmy]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achievement $achievement)
    {
        //Validar los datos que se recibe
        $data = request()->validate([
            'name'=> 'required',
            'description'=>'required',
        ]);

        //Codigo para guardar los datos
        $user = auth()->user();//Recuper al Usuario que esta logeado
        $achievement = Achievement::findOrFail($achievement->id);
        $achievement->name = request('name');
        $achievement->description = request('description');
        $achievement->user_id = $user->id;
        $achievement->save();
        Alert::toast('Logro actualizado','success');
        return redirect('/achievements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Achievement  $achievement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $achievement = Achievement::find($request->achievement_id);

        //Se borra el contenido de la base de datos.
        $achievement->delete();

        return redirect('/achievements');
    }
}

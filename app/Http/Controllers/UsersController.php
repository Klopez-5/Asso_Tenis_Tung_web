<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Category;
use App\Club;
use App\Level;
use App\Relation;
use App\Role;
use App\User;
use App\Province;
use Illuminate\Http\Request;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        Gate::authorize('haveaccess','user.index');
        $users = User::with('roles')->orderBy('id','desc')->get();
        $clubs = Club::all();
        $levels = Level::all();
        $categories = Category::all();
        $relations = Relation::all();
        $represents = User::all();
        return view('/admin/users/index',
                ['users' => $users,
                'clubs'=>$clubs,
                'levels'=>$levels,
                'categories'=>$categories,
                'relations'=>$relations,
                'represents'=>$represents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('haveaccess','create.create');
        $clubs = Club::all();
        $roles = Role::all();
        $levels = Level::all();
        $categories = Category::all();
        $relations = Relation::all();
        $provinces = Province::all();
        return view('/admin/users/create',
                ['clubs'=>$clubs,
                'roles'=>$roles,
                'levels'=>$levels,
                'categories'=>$categories,
                'provinces'=>$provinces,
                'relations'=>$relations]);
    }

    /**
     * Store a newly created resource in storage
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar los datos que se recibe
        $data = request()->validate([
            'name'=> 'required',
            'card_id'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'password'=> 'required',
            'date_of_birth'=> 'required',
            'address'=>'required',
            'image'=>'required|image',
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
        $path = request('image')->storeAs('public/images/users_images',$newFileName);

        //Codigo para guardar los datos
        //$user = auth()->user();//Recuper al Usuario que esta logeado
        $user = new User();
        $user->image_url = $newFileName;
        $user->name = request('name');
        $user->last_name = request('last_name');
        $user->card_id = request('card_id');
        $user->email = request('email');
        $user->password = Hash::make(request('password'));
        $user->address = request('address');
        $user->phone = request('phone');
        $dateInput = date_create(request('date_of_birth'));
        $user->date_of_birth = $dateInput;
        $user->age = CarbonCarbon::parse($dateInput)->age;
        $user->club_id = request('club_id');
        $user->level_id = request('level_id');
        $user->category_id = request('category_id');
        $user->relation_id = request('relation_id');
        $user->represented_id = request('represented_id');
        //$user->user_id = $user->id;

        $user->save();
        $user->roles()->sync([$request->get('rol_id')]);
        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view', [$user, ['user.show','userown.show'] ]);
        //Codigo para guardar los datos
       // $user = auth()->user();//Recuper al Usuario que esta logeado
        $clubs = Club::all();
        $levels = Level::all();
        $categories = Category::all();
        $relations = Relation::all();
        $provinces = Province::all();
        $achievements = Achievement::where('user_id',$user->id)->get();
        if(isset($user->represented_id)){
            $represented = User::where('id',$user->represented_id)->get();
        }else{
            $represented = null;
        }

        return view('/admin/users/show', [
                'user' => $user,
                'clubs'=>$clubs,
                'levels'=>$levels,
                'categories'=>$categories,
                'relations'=>$relations,
                'represented'=>$represented,
                'provinces'=>$provinces,
                'achievements' => $achievements]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', [$user, ['user.edit','userown.edit'] ]);
        //Crear una variable para poder editar lo que contiene
        //$user = Role::find($user->id);
        $clubs = Club::all();
        $roles = Role::all();
        $levels = Level::all();
        $categories = Category::all();
        $relations = Relation::all();
        $provinces = Province::all();
        return view('/admin/users/edit',
                ['user' => $user,
                'clubs'=>$clubs,
                'roles'=>$roles,
                'levels'=>$levels,
                'categories'=>$categories,
                'provinces'=>$provinces,
                'relations'=>$relations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //Validar los datos que se recibe
        $data = request()->validate([
            'name'=> 'required',
            'card_id'=> 'required',
            'last_name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
            'date_of_birth'=> 'required',
            'address'=>'required',
            'image'=>'image',
        ]);

        //Codigo para guardar los datos
        //$user = auth()->user();//Recuper al Usuario que esta logeado
        $user = User::findOrFail($user->id);


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
            $path = request('image')->storeAs('public/images/users_images',$newFileName);

            //Se actualiza solo en el caso de que se cambie la imagen, caso contrario no va a cambiar,
            // por eso se le agrega dentro del if, y no a fuera como los otros parametros.
            $user->image_url = $newFileName;
        }

        $user->name = request('name');
        $user->last_name = request('last_name');
        $user->card_id = request('card_id');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->address = request('address');
        $dateInput = date_create(request('date_of_birth'));
        $user->date_of_birth = $dateInput;
        $user->age = CarbonCarbon::parse($dateInput)->age;
        $user->club_id = request('club_id');
        $user->level_id = request('level_id');
        $user->category_id = request('category_id');
        $user->relation_id = request('relation_id');
        $user->represented_id = request('represented_id');

        $user->save();
        $user->roles()->sync([$request->get('rol_id')]);
        return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Gate::authorize('haveaccess','user.destroy');
        $user = User::find($request->user_id);
        //Codigo para borrar tambien las imagenes de la carpeta.
        $oldImage = public_path().'/storage/images/users_images/'.$user->image_url;
        if(file_exists($oldImage)){
            unlink($oldImage);
        }
        //Se borra el contenido de la base de datos.
        $user->delete();

        return redirect('/users');
    }
}

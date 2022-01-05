<?php

namespace App\Http\Controllers;

use App\Category;
use App\Club;
use App\Level;
use App\Province;
use App\Relation;
use App\Role;
use App\User;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clubs = Club::all();
        $roles = Role::all();
        $levels = Level::all();
        $categories = Category::all();
        $relations = Relation::all();
        $provinces = Province::all();
        return view('/registro/create',[
            'clubs'=>$clubs,
            'roles'=>$roles,
            'levels'=>$levels,
            'categories'=>$categories,
            'provinces'=>$provinces,
            'relations'=>$relations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //Validar los datos que se recibe
            $data = request()->validate([
                'name'=> 'required',
                'card_id'=> 'required',
                'last_name'=> 'required',
                'email'=> 'required|unique:users,email',
                'email2'=> 'unique:users,email',
                'phone'=> 'required',
                'password'=> 'required',
                'date_of_birth'=> 'required',
                'address'=>'required',
                'club_id'=>'required',
                'province_id'=>'required',
                'level_id'=>'required',
                'image'=>'required|image',
            ]);
            if(request('name2') != null){
                $user2 = new User();
                $user2->name = request('name2');
                $user2->last_name = request('last_name2');
                $user2->card_id = request('card_id2');
                $user2->email = request('email2');
                $user2->password = Hash::make(request('password'));
                $user2->address = request('address2');
                $user2->phone = request('phone2');
                $dateInput2 = date_create(request('date_of_birth2'));
                $user2->date_of_birth = $dateInput2;
                $user2->age = CarbonCarbon::parse($dateInput2)->age;
                $user2->relation_id = request('relation_id');
                $user2->save();
                $user2->roles()->sync([4]);
            }

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

            $user = new User();
            $user->name = request('name');
            $user->image_url = $newFileName;
            $user->last_name = request('last_name');
            $user->card_id = request('card_id');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->address = request('address');
            $user->phone = request('phone');
            $dateInput = date_create(request('date_of_birth'));
            $user->date_of_birth = $dateInput;
            $age = CarbonCarbon::parse($dateInput)->age;
            $user->age = $age;
            $user->club_id = request('club_id');
            $user->level_id = request('level_id');
            $user->province_id = request('province_id');
            if($age >= "3" and $age <= "10"){
                $user->category_id = "1";
            }
            else if($age == "11" || $age == "12"){
                $user->category_id = "2";
            }
            else if($age == "13" || $age == "14"){
                $user->category_id = "3";
            }
            else if($age == "15" || $age == "16"){
                $user->category_id = "4";
            }
            else if($age >= "17"){
                $user->category_id = "5";
            }
            if(request('name2') != null){
                $user->represented_id = $user2->id;
            }
            $user->save();
            $user->roles()->sync([2]);

            Alert::toast('Registro completado','success');
            return redirect('/login');

        }catch (Exception $exception){
            alert()->error('ErrorAlert','Registro fallido - Revise los datos por favor');

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        $user = auth()->user();//Recuper al Usuario que esta logeado
        return view('/registro/show',['user' => $user]);
    }


}

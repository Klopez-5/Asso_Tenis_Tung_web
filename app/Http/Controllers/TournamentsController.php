<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupTournament;
use App\Participant;
use App\Province;
use Illuminate\Http\Request;
use App\Tournament;
use Illuminate\Support\Facades\Gate;

class TournamentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gate::authorize('haveaccess','role.index');
        $tournaments = Tournament::all();
        return view('/admin/tournaments/index',['tournaments' => $tournaments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //Gate::authorize('haveaccess','role.create');
      // $permissions = Permission::get();
        return view('/admin/tournaments/create'/*,['permissions' => $permissions]*/);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Gate::authorize('haveaccess','role.create');

        $data = request()->validate([
            'name'=> 'required',
            'site'=> 'required',
            'date'=> 'required',
            'state'=> 'required',
            'type'=> 'required',
            'image'=>'required|image',
        ]);
        //Codigo para guardar los datos
        //$user = auth()->user();//Recuper al Usuario que esta logeado
        $tournament = new Tournament();
        //-------------------------------------  AFICHE  ----------------------------------------------
        //Codigo para guardar la ruta de la  imagen
        $fileNameWithTheExtension = request('image')->getClientOriginalName();
        //Se optine el nombre del archivo
        $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
        //Se guarda en una variable la extension de la imagen
        $extension = request('image')->getClientOriginalExtension();
        //Se le cambia el nombre de la imagen.
        $newFileName = $fileName.'_'.time().'.'.$extension;
        //Se va a crear una ruta para poder guardar ahi las imagenes.
        $path = request('image')->storeAs('public/images/tournaments_images',$newFileName);

        //-------------------------------------  REGLAMENTO  ----------------------------------------------
        if(request('reglamento')) {
            //Codigo para guardar la ruta del pdf
            $fileNameWithTheExtensionR = request('reglamento')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileNameR = pathinfo($fileNameWithTheExtensionR, PATHINFO_FILENAME);
            //Se guarda en una variable la extension del pdf
            $extensionR = request('reglamento')->getClientOriginalExtension();
            //Se le cambia el nombre del pdf.
            $newFileNameR = $fileNameR.'_'.time().'.'.$extensionR;
            //Se va a crear una ruta para poder guardar ahi los archivos.
            $path = request('reglamento')->storeAs('public/pdfs/tournaments_pdf',$newFileNameR);
            $tournament->reglamento_url = $newFileNameR;

        }
        //-------------------------------------  PROTOCOLO  ----------------------------------------------
        if(request('protocolo')) {
            //Codigo para guardar la ruta del pdf
            $fileNameWithTheExtensionP = request('protocolo')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileNameP = pathinfo($fileNameWithTheExtensionP, PATHINFO_FILENAME);
            //Se guarda en una variable la extension del pdf
            $extensionP = request('protocolo')->getClientOriginalExtension();
            //Se le cambia el nombre del pdf.
            $newFileNameP = $fileNameP.'_'.time().'.'.$extensionP;
            //Se va a crear una ruta para poder guardar ahi los archivos.
            $path = request('protocolo')->storeAs('public/pdfs/tournaments_pdf',$newFileNameP);
            $tournament->protocolo_url = $newFileNameP;
        }


        //-------------------------------------  RESULTADOS  ----------------------------------------------
        if(request('result')) {
            //Codigo para guardar la ruta del pdf
            $fileNameWithTheExtensionRe = request('result')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileNameRe = pathinfo($fileNameWithTheExtensionRe, PATHINFO_FILENAME);
            //Se guarda en una variable la extension del pdf
            $extensionRe = request('result')->getClientOriginalExtension();
            //Se le cambia el nombre del pdf.
            $newFileNameRe = $fileNameRe.'_'.time().'.'.$extensionRe;
            //Se va a crear una ruta para poder guardar ahi los archivos.
            $path = request('result')->storeAs('public/pdfs/tournaments_pdf',$newFileNameRe);
            $tournament->resultados_url = $newFileNameRe;
        }


        $tournament->afiche_url = $newFileName;

        $tournament->name = request('name');
        $tournament->site = request('site');
        $tournament->state = request('state');
        $tournament->type_of_tournament = request('type');
        $tournament->cost = request('cost');
        $tournament->address = request('address');
        $tournament->description = request('description');
        $dateInput = date_create(request('date'));
        $tournament->date = $dateInput;

        $tournament->save();
        //$role->permissions()->sync($request->get('permission'));
        return redirect('/tournaments');
    }

    /**
     * Display the specified resource.
     *
     * @param  Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
       //Gate::authorize('haveaccess','tournament.show');
        $tournament_groups= [];

        foreach ($tournament->groups as $group) {
            $tournament_groups[] = $group->id;
        }
        $groups = Group::get();
        $participants = Participant::get();
        $provinces = Province::get();
        return view('/admin/tournaments/show',compact('groups', 'tournament', 'tournament_groups','provinces', 'participants') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        return view('/admin/tournaments/edit',['tournament' => $tournament ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        $data = request()->validate([
            'name'=> 'required',
            'site'=> 'required',
            'date'=> 'required',
            'state'=> 'required',
            'type'=> 'required',
            'image'=>'image',
        ]);

        //Codigo para guardar la ruta de la  imagen
        $tournament = Tournament::findOrFail($tournament->id);


        if(request('image')) {
            $fileNameWithTheExtension = request('image')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
            //Se guarda en una variable la extension de la imagen
            $extension = request('image')->getClientOriginalExtension();
            //Se le cambia el nombre de la imagen.
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            //Se va a crear una ruta para poder guardar ahi las imagenes.
            $path = request('image')->storeAs('public/images/tournaments_images', $newFileName);
            $tournament->afiche_url = $newFileName;
        }

        //-------------------------------------  REGLAMENTO  ----------------------------------------------
        if(request('reglamento')) {
            //Codigo para guardar la ruta del pdf
            $fileNameWithTheExtensionR = request('reglamento')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileNameR = pathinfo($fileNameWithTheExtensionR, PATHINFO_FILENAME);
            //Se guarda en una variable la extension del pdf
            $extensionR = request('reglamento')->getClientOriginalExtension();
            //Se le cambia el nombre del pdf.
            $newFileNameR = $fileNameR . '_' . time() . '.' . $extensionR;
            //Se va a crear una ruta para poder guardar ahi los archivos.
            $path = request('reglamento')->storeAs('public/pdfs/tournaments_pdf', $newFileNameR);
            $tournament->reglamento_url = $newFileNameR;
        }
        //-------------------------------------  PROTOCOLO  ----------------------------------------------
        if(request('protocolo')) {
            //Codigo para guardar la ruta del pdf
            $fileNameWithTheExtensionP = request('protocolo')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileNameP = pathinfo($fileNameWithTheExtensionP, PATHINFO_FILENAME);
            //Se guarda en una variable la extension del pdf
            $extensionP = request('protocolo')->getClientOriginalExtension();
            //Se le cambia el nombre del pdf.
            $newFileNameP = $fileNameP . '_' . time() . '.' . $extensionP;
            //Se va a crear una ruta para poder guardar ahi los archivos.
            $path = request('protocolo')->storeAs('public/pdfs/tournaments_pdf', $newFileNameP);
            $tournament->protocolo_url = $newFileNameP;
        }
        //-------------------------------------  RESULTADOS  ----------------------------------------------
        if(request('result')) {
            //Codigo para guardar la ruta del pdf
            $fileNameWithTheExtensionRe = request('result')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileNameRe = pathinfo($fileNameWithTheExtensionRe, PATHINFO_FILENAME);
            //Se guarda en una variable la extension del pdf
            $extensionRe = request('result')->getClientOriginalExtension();
            //Se le cambia el nombre del pdf.
            $newFileNameRe = $fileNameRe . '_' . time() . '.' . $extensionRe;
            //Se va a crear una ruta para poder guardar ahi los archivos.
            $path = request('result')->storeAs('public/pdfs/tournaments_pdf', $newFileNameRe);
            $tournament->resultados_url = $newFileNameRe;
        }
        $tournament->name = request('name');
        $tournament->site = request('site');
        $tournament->state = request('state');
        $tournament->type_of_tournament = request('type');
        $tournament->cost = request('cost');
        $tournament->address = request('address');
        $tournament->description = request('description');
        $dateInput = date_create(request('date'));
        $tournament->date = $dateInput;

        $tournament->save();
        return redirect('/tournaments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Gate::authorize('haveaccess','role.destroy');
        $tournament = Tournament::find($request->tournament_id);
        if(isset($tournament->afiche_url)) {
            $oldImage = public_path() . '/storage/images/tournaments_images/' . $tournament->afiche_url;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
        }

        if(isset($tournament->reglamento_url)){
            $oldPdf1 = public_path().'/storage/pdfs/tournaments_pdf/'.$tournament->reglamento_url;
            if(file_exists($oldPdf1)){
                unlink($oldPdf1);
            }
        }

        if(isset($tournament->protocolo_url)) {
            $oldPdf2 = public_path() . '/storage/pdfs/tournaments_pdf/' . $tournament->protocolo_url;
            if (file_exists($oldPdf2)) {
                unlink($oldPdf2);
            }
        }

        if(isset($tournament->resultados_url)) {
            $oldPdf3 = public_path() . '/storage/pdfs/tournaments_pdf/' . $tournament->resultados_url;
            if (file_exists($oldPdf3)) {
                unlink($oldPdf3);
            }
        }
        //Se borra el contenido de la base de datos.
        $tournament->delete();

        return redirect('/tournaments');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function form(Tournament $tournament)
    {
        $provinces = Province::all();
        return view('/admin/tournaments/form',['tournament' => $tournament, 'provinces'=>$provinces]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function inscribir(Request $request, Tournament $tournament)
    {
        $data = request()->validate([
            'nameGroup'=> 'required',
            'province_id'=> 'required',
            'comprobante'=>'image',
        ]);
        $group = new Group();
        if(request('comprobante')) {
            $fileNameWithTheExtension = request('comprobante')->getClientOriginalName();
            //Se optine el nombre del archivo
            $fileName = pathinfo($fileNameWithTheExtension, PATHINFO_FILENAME);
            //Se guarda en una variable la extension de la imagen
            $extension = request('comprobante')->getClientOriginalExtension();
            //Se le cambia el nombre de la imagen.
            $newFileName = $fileName . '_' . time() . '.' . $extension;
            //Se va a crear una ruta para poder guardar ahi las imagenes.
            $path = request('comprobante')->storeAs('public/images/tournaments_comprobante', $newFileName);
            $group->comprobante_url = $newFileName;
        }
        $group->name = request('nameGroup');
        $group->province_id = request('province_id');
        $group->descripcionM = request('descripcionM');

        $group->save();

        $tournament->groups()->sync([$group['id']]);

        //PARTICIPANTE 1
        $participant1 = new Participant();
        $participant1->card_id = request('carid1');
        $participant1->name = request('name1');
        $participant1->las_name = request('lastname1');
        $participant1->group_id = $group->id;
        $participant1->save();

        if($tournament['type_of_tournament'] == "Dobles" || $tournament['type_of_tournament'] == "Por equipos" || $tournament['type_of_tournament'] == "Interclubs"){
            //PARTICIPANTE 2
            $participant2 = new Participant();
            $participant2->card_id = request('carid2');
            $participant2->name = request('name2');
            $participant2->las_name = request('lastname2');
            $participant2->group_id = $group->id;
            $participant2->save();
        }

        if($tournament['type_of_tournament'] == "Por equipos" || $tournament['type_of_tournament'] == "Interclubs"){
            //PARTICIPANTE 3
            if(request('carid3')){
                $participant3 = new Participant();
                $participant3->card_id = request('carid3');
                $participant3->name = request('name3');
                $participant3->las_name = request('lastname3');
                $participant3->group_id = $group->id;
                $participant3->save();
            }

            if(request('carid4')){
                //PARTICIPANTE 4
                $participant4 = new Participant();
                $participant4->card_id = request('carid4');
                $participant4->name = request('name4');
                $participant4->las_name = request('lastname4');
                $participant4->group_id = $group->id;
                $participant4->save();
            }
        }

        return redirect('/dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
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
        //Gate::authorize('haveaccess','role.index');
        $permissions = Permission::all();
        return view('/admin/permissions/index',['permissions' => $permissions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Gate::authorize('haveaccess','role.create');
        $permissions = Permission::get();
        return view('/admin/permissions/create',['permissions' => $permissions]);
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
        $request->validate([
            'name'          => 'required|max:50|unique:roles,name',
            'slug'          => 'required|max:50|unique:roles,slug'
        ]);
        //Se le rellena con todos los datos que trae el request y se agrega en la base de datos
        $permission = Permission::create($request->all());

        return redirect('/permissions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //Gate::authorize('haveaccess','role.show');
        return view('/admin/permissions/show',['permission' => $permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //Gate::authorize('haveaccess','role.show');
        return view('/admin/permissions/edit',['permission' => $permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //Gate::authorize('haveaccess','role.edit');
        $request->validate([
            'name'          => 'required|max:50|unique:roles,name,'.$permission->id,
            'slug'          => 'required|max:50|unique:roles,slug,'.$permission->id
        ]);

        $permission->update($request->all());
        return redirect('/permissions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Gate::authorize('haveaccess','role.destroy');
        $permission = Permission::find($request->permission_id);
        //Se borra el contenido de la base de datos.
        $permission->delete();

        return redirect('/permissions');
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $categories = Category::all();

        return view('/admin/categories/index',['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/admin/categories/create');
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
            'age_min'=> 'required',
            'age_max'=> 'required',
        ]);

        //Codigo para guardar los datos
        $category = new Category();

        $category->title = request('title');
        $category->age_min = request('age_min');
        $category->age_max = request('age_max');

        $category->save();

        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //Crear una variable para poder editar lo que contiene
        $category = Category::find($category->id);
        return view('/admin/categories/edit',['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //Validar los datos que se recibe
        $data = request()->validate([
            'title'=> 'required',
            'age_min'=> 'required',
            'age_max'=> 'required',
        ]);

        //Codigo para guardar los datos
        $category = Category::findOrFail($category->id);

        $category->title = request('title');
        $category->age_min = request('age_min');
        $category->age_max = request('age_max');

        $category->save();

        return redirect('/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $category = Category::find($request->category_id);
        //Se borra el contenido de la base de datos.
        $category->delete();

        return redirect('/categories');
    }
}

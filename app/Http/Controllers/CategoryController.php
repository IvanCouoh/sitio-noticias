<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryGroup;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataCat['categories'] = Category::all();
        $dataCatGroup['categoryGroups'] = CategoryGroup::all();
        return view('admin.category.index', $dataCat, $dataCatGroup);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataCatGroup['categoryGroups'] = CategoryGroup::all();
        return view('admin.category.create', $dataCatGroup);
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
            'name' => 'required|string|max:250',
            'category_group_id' => 'required|not_in:0',
        ],[
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre es demaciado largo.',
            'category_group_id.required' => 'Se requiere seleccionar una categoría.',
        ]);

        $categoryData = request()->except('_token');

        Category::create($categoryData);
        return redirect()->route('categorias.index')->with('message', 'Se ha creado con éxito la categoría');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $dataCatGroup['categoryGroups'] = CategoryGroup::all();
        return view('admin.category.edit', compact('category'), $dataCatGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $field = [
            'name' => 'required|string|max:100',
        ];

        $message=[
            'name.required' => 'El nombre es requerido.',
        ];

        $this->validate($request, $field, $message);
        $categoryData = request()->except('_token','_method');
        Category::where('id','=',$id)->update($categoryData);
        Category::findOrFail($id);
        return redirect()->route('categorias.index')->with('message','Se ha editado con éxito la categoría.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('categorias.index')->with('message','Se ha eliminado con éxito la categoría.');
    }
}

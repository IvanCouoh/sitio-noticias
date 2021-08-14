<?php

namespace App\Http\Controllers;

use App\Models\CategoryGroup;
use Illuminate\Http\Request;

class CategoryGroupController extends Controller
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
        $dataCat['categories'] = CategoryGroup::all();
        return view('admin.category_group.create', $dataCat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $field = [
            'name' => 'required|string|max:100',
            // 'category_group_id' => 'required|in:Asigne una categoría',
        ];

        $message=[
            'name.required' => 'El nombre es requerido.',
            // 'category_group_id.required' => 'Se requiere una categoría.',
        ];

        $this->validate($request, $field, $message);

        $categyData = request()->except('_token');
        CategoryGroup::create($categyData);
        return redirect('/categorias')->with('message', 'Se ha creado con éxito el grupo de categoría.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryGroup $categoryGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoryGroup = CategoryGroup::findOrFail($id);
        return view('admin.category_group.edit', compact('categoryGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryGroup  $categoryGroup
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

        $categyData = request()->except('_token','_method');
        CategoryGroup::where('id','=',$id)->update($categyData);
        CategoryGroup::findOrFail($id);
        return redirect('/categorias')->with('message','Se ha editado con éxito el grupo de categoría.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryGroup  $categoryGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryGroup::destroy($id);
        return redirect('/categorias')->with('message','Se ha eliminado con éxito este grupo de categoría.');
    }
}

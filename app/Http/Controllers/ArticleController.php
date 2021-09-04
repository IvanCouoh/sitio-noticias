<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articleData['articles'] = Article::orderByRaw('created_at DESC')->paginate(5);
        return view('admin.articles.index', $articleData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $grupo = 'Noticias';
        $categoryData['categories'] = CategoryGroup::with(['categories'])->where('name', $grupo)->first()->categories;
        return view('admin.articles.create', $categoryData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $articleData = request()->except('_token');

        $this->validate($request, [
            'name' => 'required|string|max:250',
            'author' => 'required|string|max:250',
            'category_id' => 'required|not_in:0',
            'image' => 'required|mimes:jpg,jepg,png',
            'description' => 'required|string|min:20|max:100000',
        ],[
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre es demaciado largo.',
            'author.required' => 'El autor es requerido.',
            'author.max' => 'El autor es demaciado largo.',
            'category_id.required' => 'Se requiere seleccionar una categoría.',
            'image.required' => 'La imagen es requerida.',
            'image.mimes' => 'Solo puede seleccionar archivo .jpg .jpeg o .png.',
            'description.required' => 'La descripción es requerida.',
            'description.min' => 'La descripción es demasiado corta.',
            'description.max' => 'La descripción es demasiada larga.',
        ]);

        if($request->hasFile('image')){
            $articleData['image'] = $request->file('image')->store('uploads','public');
        }

        Article::create($articleData);
        return redirect()->route('noticias.index')->with('message','La noticia se ha creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $grupo = 'Noticias';
        $categories = CategoryGroup::with(['categories'])->where('name', $grupo)->first()->categories;
        return view('admin.articles.edit', compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articleData = request()->except('_token','_method');

        if($request->hasFile('image')){
            $article = Article::findOrFail($id);
            Storage::delete('public/'.$article->image);
            $articleData['image'] = $request->file('image')->store('uploads','public');
        }

        Article::where('id','=',$id)->update($articleData);
        $article = Article::findOrFail($id);
        return redirect()->route('noticias.index')->with('message','Se ha editado con éxito la noticia.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article = Article::findOrFail($id);
        if(Storage::delete('public/'.$article->image)){
            Article::destroy($id);
        }
        return redirect()->route('noticias.index')->with('message','Se ha eliminado con éxito la noticia,');
    }
}

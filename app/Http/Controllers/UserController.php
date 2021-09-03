<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        return view('admin.articles.profile');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profileEdit(){
        return view('admin.profile.index');
    }

    public function profileUpdate(Request $request, $id){
        $userData = request()->except('_token','_method');

        $this->validate($request, [
            'name' => 'required|string|max:250',
            'email' => 'required|string|email|max:250',
            'profile' => 'required|mimes:jpg,jepg,png',
        ],[
            'name.required' => 'El nombre es requerido.',
            'name.max' => 'El nombre es demaciado largo.',
            'email.required' => 'El email es requerido.',
            'email.max' => 'El email es demaciado largo.',
            'email.email' => 'El email debe llevar un caracter @',
            'profile.mimes' => 'Solo puede seleccionar archivo .jpg .jpeg o .png.',
        ]);

        if($request->hasFile('profile')){
            $user = User::findOrFail($id);
            Storage::delete('public/'.$user->profile);
            $userData['profile'] = $request->file('profile')->store('uploads','public');
        }

        if(empty($request['password'])){
            unset($userData['password']);
        }else{
            $userData['password'] = Hash::make($request['password']);
        }

        User::where('id','=',$id)->update($userData);
        return redirect()->route('admin.profile.edit')->with('message','Se ha actualizado tu perfil correctamente');
    }
}

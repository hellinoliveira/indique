<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = Auth::User();
        return view('perfil.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  Integer $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $titular = $request->input('nome_titular_conta') == '' ? $request->input('name') : $request->input('nome_titular_conta');
        $request->offsetSet('nome_titular_conta', $titular);
        $user->update($request->all());

        return view('perfil.edit', compact('user'));
    }

    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {

        $users = User::where('is_admin', false)->get();

        return view('usuarios.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->save();

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function filtro(Request $request)
    {
//        $request->input('filtro');
//        $user = User::find($id);
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }
}

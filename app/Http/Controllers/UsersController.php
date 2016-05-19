<?php

namespace App\Http\Controllers;

use App\User;
use Image;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return mixed
     */
    public function index()
    {

        $users = User::where([
            ['is_ativo', true],
            ['is_admin', false]
        ])->orderBy('name')->get();
        $selecionado = 0;
        $ordenado = 0;
        return view('usuarios.index', compact('users', 'selecionado', 'ordenado'));
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Editar o perfil do usuario
     */
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
        $this->preencherCamposUsuario($request);

        $user->update($request->all());

        return view('perfil.edit', compact('user'));
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

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Filtra os usuários
     */
    public function filtro(Request $request)
    {
        $selecionado = $request->input('filtro');
        $ordenado = $request->input('ordem');
        $orderBy = 'name';

        $by = 'asc';
        if ($ordenado == 1) {
            $by = 'desc';
        }
        if ($ordenado == 2) {
            $orderBy = 'created_at';
        }


        switch ($selecionado) {
            case 0:
                $users = User::where([
                    ['is_ativo', true],
                    ['is_admin', false]
                ])->orderBy($orderBy, $by)
                    ->get();
                break;
            case 1:
                $users = User::where('is_ativo', false)
                    ->orderBy($orderBy, $by)
                    ->get();
                break;
            case 2:
                $users = User::where('is_admin', true)
                    ->orderBy($orderBy, $by)
                    ->get();

                break;
            case 3:
                $users = User::orderBy($orderBy, $by)->get();
                break;
        }
        if ($ordenado == 3 || $ordenado == 4) {
            $users = $this->ordenar($users, $ordenado);
        }


        return view('usuarios.index', compact('users', 'selecionado', 'ordenado'));
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

    /**
     * Preenche o nome titular e foto do usuario
     * @param Request $request
     */
    public function preencherCamposUsuario(Request $request)
    {
        $titular = $request->input('nome_titular_conta') == '' ? $request->input('name') : $request->input('nome_titular_conta');
        $request->offsetSet('nome_titular_conta', $titular);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $nomeArquivo = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('assets/img/profile/' . $nomeArquivo));
            $request->offsetSet('photo', $nomeArquivo);
        }
    }


    /**
     * @param $users
     * @param $ordenado
     * @return mixed
     */
    public function ordenar($users, $ordenado)
    {
        if ($ordenado == 3) {
            $sorted = $users->sortByDesc(function ($user, $key) {
                return count($user['indicacoes']);
            });
        } else if ($ordenado == 4) {
            $sorted = $users->sortBy(function ($user, $key) {
                return count($user['indicacoes']);
            });
        }
        $users = $sorted->values()->all();
        return $users;
    }
}

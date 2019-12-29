<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->get();
        return view('client.users.index', compact('users'));
    }

    public function new()
    {
        return view('client.users.store');
    }

    public function store(UserRequest $request)
    {
        try
        {
            $userData = $request->all();
            $request->validated();
            $userData['password'] = bcrypt($userData['password']);
            $user = new User();
            $user->create($userData);

            flash('Usuário criado com sucesso!')->success();
        }
        catch (Exception $e)
        {
            flash('Erro ao tentar criar usuário')->error();
        }

        return redirect()->route('user.index');

    }

    // obs: Por algum motivo, o laravel não aceita outro nome de variavel '$id'
    public function edit()
    {
        $user = Auth::user();
        return view('client.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request)
    {
        try
        {
            $userData = $request->all();
            $userData['password'] = bcrypt($userData['password']);

            $user = Auth::user()->update($userData);

            flash('Usuario atualizado com sucesso!')->success();
            return redirect()->route('user.index');
        }
        catch (Exception $e)
        {
            flash('Erro ao tentar atualizar usuário<br>' . $e->getMessage())->error();
            return redirect()->route('user.edit');
        }
    }

    public function delete()
    {
        try
        {
            $user = User::where('id', Auth::user()->id)->get();
            $user->delete();
            flash('Sua conta foi deletada com sucesso!')->success();
        }
        catch (Exception $e)
        {
            flash('Desculpe<br>Error ao tentar deletar sua conta<br>' . $e->getMessage())->error();
        }

        return redirect()->route('/');

    }
}

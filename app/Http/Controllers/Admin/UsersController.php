<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function new()
    {
        return view('admin.users.store');
    }

    public function store(UserRequest $request)
    {
        try
        {
            $userData = $request->all();
            $request->validated();
            $userData['password'] = bcrypt($userData['password']);
            $userData['is_admin'] = 0;
            $user = new User();
            $user->create($userData);

            flash('Usuário criado com sucesso!')->success();
        }
        catch (Exception $e)
        {
            flash('Erro ao tentar criar usuário<br>' . $e->getMessage())->error();
        }

        return redirect()->route('admin.users.index');
    }

    // obs: Por algum motivo, o laravel não aceita outro nome de variavel '$id'
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, $user)
    {
        try
        {
            $userData = $request->all();
            $request->validated();
            $userData['password'] = bcrypt($userData['password']);

            $user = User::findOrFail($user);
            $user->update($userData);

            flash('Usuário atualizado com sucesso!')->success();
        }
        catch (Exception $e)
        {
            flash('Erro ao tentar atualizar usuário<br>' . $e->getMessage())->error();
        }

        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        try
        {
            $user = User::findOrFail($id);
            $user->delete();

            flash('Usuário deletado com sucesso!')->success();
        }
        catch (Exception $e)
        {
            flash('Erro ao tentar deletar usuário<br>' . $e->getMessage())->error();
        }

        return redirect()->route('admin.users.index');
    }
}

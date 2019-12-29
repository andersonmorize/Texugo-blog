@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="float-left">Usuários</h1>
    <a href="{{ route('admin.users.new') }}" class="float-right btn btn-success">Novo</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <th>{{ $u->id }}</th>
                    <th>{{ $u->name }}</th>
                    <th>{{ $u->created_at }}</th>
                    <th>
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('admin.users.delete', $u->id ) }}" class="btn btn-danger">Excluir</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

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
                <th>Permissões</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr>
                    <th>{{ $u->id }}</th>
                    <th>{{ $u->name }}</th>
                    <th>
                        @if($u->is_admin)
                            Admin
                        @else
                            Cliente
                        @endif
                    </th>
                    <th class="row">
                        <a href="{{ route('admin.users.edit', $u->id) }}" class="btn btn-primary col-2 mr-2">Editar</a>
                        <form class="form-inline col-2" action="{{route('admin.users.update', ['id' => $u->id])}}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="hidden" name="is_admin" value="{{ !$u->is_admin }}">
                            </div>
                            <button type="submit" class="btn btn-info border text-white">
                                @if($u->is_admin)
                                    Cliente
                                @else
                                    Admin
                                @endif
                            </button>
                        </form>
                        <form action="{{ route('admin.users.destroy', $u->id ) }}" class="col-2" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="input" class="btn btn-danger">Excluir</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

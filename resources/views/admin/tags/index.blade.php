@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="float-left">Tags</h1>
    <a href="{{ route('tag.create') }}" class="float-right btn btn-success">Novo</a>
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
            @foreach ($tags as $t)
                <tr>
                    <th>{{ $t->id }}</th>
                    <th>{{ $t->name }}</th>
                    <th>{{ $t->created_at }}</th>
                    <th class="row">
                        <a href="{{ route('tag.edit', $t->id) }}" class="btn btn-primary col-2">Editar</a>
                        <form action="{{ route('tag.destroy', $t->id ) }}" method="POST" class="col">
                            @csrf
                            @method("DELETE");
                            <button type="submit" class="btn btn-danger">Excluir</a>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

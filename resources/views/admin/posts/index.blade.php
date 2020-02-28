@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="float-left">Posts</h1>
    <a href="{{ route('post.create') }}" class="float-right btn btn-success">Novo</a>
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
            @foreach ($posts as $p)
                <tr>
                    <th>{{ $p->id }}</th>
                    <th>{{ $p->title }}</th>
                    <th>{{ $p->created_at }}</th>
                    <th class="row">
                        <a href="{{ route('post.edit', $p->id) }}" class="btn btn-primary col-2">Editar</a>
                        <form action="{{ route('post.destroy', $p->id ) }}" method="POST" class="col">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

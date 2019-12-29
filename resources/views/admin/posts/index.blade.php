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
                <!--<th>Ações</th>-->
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $p)
                <tr>
                    <th>{{ $p->id }}</th>
                    <th>{{ $p->title }}</th>
                    <th>{{ $p->created_at }}</th>
                    <th>
                        <a href="{{ route('post.edit', $p->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('post.destroy', $p->id ) }}" class="btn btn-danger">Excluir</a>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

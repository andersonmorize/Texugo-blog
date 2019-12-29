@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Usuários</h5>
                <div class="card-body">
                    <p class="card-text"><strong>Quantidade: </strong>{{ $total_users }}</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Visitar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h5 class="card-header">Posts</h5>
                <div class="card-body">
                    <p class="card-text"><strong>Quantidade: </strong>{{ $total_posts }}</p>
                    <a href="{{ route('post.index') }}" class="btn btn-primary">Visitar</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-5">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Tags</h5>
                <div class="card-body">
                    <p class="card-text"><strong>Quantidade: </strong>{{ $total_tags }}</p>
                    <a href="{{ route('tag.index') }}" class="btn btn-primary">Visitar</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h5 class="card-header">Destaque</h5>
                <div class="card-body">
                    <h5 class="card-title">Título especial</h5>
                    <p class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
                    <a href="#" class="btn btn-primary">Visitar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

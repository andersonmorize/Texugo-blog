@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4">
            <div class="card mb-5">
                <img class="img-fluid mx-auto p-3 img-card-top" src="{{ asset('images/user-icon.svg') }}" alt="user-icon">
                <div class="card-body">
                    <h2 class="card-title text-center">{{ $users[0]->name }}</h2>
                    <p class="card-text text-center">{{ $users[0]->email }}</p>
                    <div class="text-center">
                        <a href="{{ route('user.edit', $users[0]->id) }}" class="btn btn-primary">Editar</a>
                        <a href="{{ route('user.delete', $users[0]->id ) }}" class="btn btn-danger">Excluir</a>
                    </div>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

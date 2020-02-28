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

                    <form action="{{ route('user.edit', $users[0]->id) }}" class="text-center m-1" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                    <form action="{{ route('user.destroy') }}" class="text-center m-1" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection

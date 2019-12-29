@extends('layouts.app')

@section('content')
<div class="container">
<h1>Edição de usuários</h1>
<hr>
    <form action="{{route('admin.users.update', ['id' => $user->id])}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label>Nome do usuário</label>
            <input class="form-control @if( $errors->has('name') ) is-invalid @endif" type="text" name="name" value="{{ $user->name }}">
            @if( $errors->has('name') )
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>Senha</label>
            <input class="form-control @if( $errors->has('password') ) is-invalid @endif" type="password" name="password">
            @if( $errors->has('password') )
                <span class="invalid-feedback">
                    {{ $errors->first('password') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label>Confirmar senha</label>
            <input class="form-control @if( $errors->has('password_confirmation') ) is-invalid @endif" type="password" name="password_confirmation">
            @if( $errors->has('password_confirmation') )
                <span class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </span>
            @endif
        </div>
        <input class="btn btn-success btn-lg" type="submit" value="Cadastrar">
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-dark h2 text-center">Criação de Tags</h2>
    <hr>
    <form action="{{route('tag.update', $tag->id)}}" method="POST">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name" class="h5">Nome</label>
            <input id="name" class="form-control" type="text" name="name" value="{{ $tag->name }}">
            @if( $errors->has('name') )
                <span class="invalid-feedback">
                    {{ $errors->first('name') }}
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-lg btn-primary float-right mb-4">Submeter Tag</button>
    </form>
</div>
@endsection

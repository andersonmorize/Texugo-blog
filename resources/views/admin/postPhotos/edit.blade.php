@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar foto</h1>
    <hr>
    <form class="mb-5" action="{{route('postPhoto.update', $photo->id)}}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="photo" class="h5">nome</label>
            <input id="photo" class="form-control" type="text" name="photo" value="{{ $photo->photo }}">
        </div>
        <button type="submit" class="btn btn-lg btn-primary float-right mb-4">Submeter Post</button>
    </form>
</div>
@endsection

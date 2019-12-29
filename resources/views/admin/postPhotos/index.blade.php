@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="row text-center">Fotos</h1>
    <hr>
    <div class="row">
        @foreach ($photos as $photo)
            <div class="card col-5 m-4">
                <img class="card-img-top" height="200" src="{{ asset('/images/' . $photo->photo)}}" alt="{{ $photo->id }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $photo->photo }}</h5>
                    <p class="card-text">post id: {{ $photo->post_id }}</p>
                    <p class="card-text">criado em {{ $photo->created_at }}</p>
                    <span><a href="{{ route('post.edit', ['post' => $photo->post_id])}}" class="btn btn-primary">Post</a></span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

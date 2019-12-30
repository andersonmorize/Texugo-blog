@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4 text-primary">{{ $post->title }}</h1>

            <!-- Author -->
            <p class="lead">
            Por
            <a href="#">{{ $post->user->name }}</a>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Postado em {{ $post->created_at }}</p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="{{ asset('/images/' . $post->photos()->first()->photo )}}" alt="">

            <hr>

            <!-- Post Content -->
            <div class="text-justify post">
                {!! $post->body !!}
            </div>
            <hr>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header bg-dark text-white">Pesquisa</h5>
                <div class="card-body">
                    <form action="{{ route('store')}}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Procurar por...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">pesquisar!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header bg-dark text-white">Categorias</h5>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 row text-center">
                        @foreach ($tags as $tag)
                            <li class="col my-1">
                                <a class="btn btn-primary btn-sm text-white" href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header bg-dark text-white">Sobre</h5>
                <div class="card-body">
                    Integer a nulla lorem. Etiam id nulla in purus efficitur consequat. Donec aliquet pellentesque lectus quis elementum. Curabitur vitae leo sit amet nunc posuere hendrerit. Maecenas placerat ipsum at erat pretium cursus. Morbi ornare odio eget pulvinar fermentum. Morbi dolor sem, faucibus vestibulum viverra blandit, accumsan a mauris.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

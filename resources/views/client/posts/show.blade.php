@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 id="{{$post->slug}}" class="mt-4 mb-0 text-center">{{ $post->title }}</h1>

            <!-- Author -->
            <p class="text-center mt-0 mb-5">
                Postado em {{ $post->created_at }} Por
                <a href="#">{{ $post->user->name }}</a>
            </p>

            <!-- Preview Image -->
            <img class="img-fluid mt-2 mb-5" src="{{ asset('/images/' . $post->photos()->first()->photo )}}" alt="">

            <!-- Post Content -->
            <div class="text-justify post">
                {!! $post->body !!}
            </div>
            <div class="text-right">
                <a href="#{{ $post->slug }}" class="btn btn-primary">Topo ^</a>
            </div>
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card border-0 my-4">
                <h5 class="card-header text-center rounded-0">Pesquisa</h5>
                <div class="card-body">
                    <form action="{{ route('store')}}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Procurar por...">
                            @if( $errors->has('search') )
                                <span class="invalid-feedback">
                                    {{ $errors->first('search') }}
                                </span>
                            @endif
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Pesquisar!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card border-0 my-4">
                <h5 class="card-header text-center rounded-0">Categorias</h5>
                <div class="card-body">
                    <ul class="list-unstyled mb-0 row list-link justify-content-center">
                        @foreach ($tags as $tag)
                            <li class="m-1">
                                <a class="" href="{{ route('tag', $tag->id) }}">{{ $tag->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- Side Widget -->
            <div class="card border-0 my-4">
                <h5 class="card-header text-center rounded-0">Sobre</h5>
                <div class="card-body">
                    <p class="text-center">Integer a nulla lorem. Etiam id nulla in purus efficitur consequat. Donec aliquet pellentesque lectus quis elementum. Curabitur vitae leo sit amet nunc posuere hendrerit. Maecenas placerat ipsum at erat pretium cursus. Morbi ornare odio eget pulvinar fermentum. Morbi dolor sem, faucibus vestibulum viverra blandit, accumsan a mauris.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

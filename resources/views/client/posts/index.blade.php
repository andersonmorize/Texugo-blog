@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Blog Post -->
            @foreach ($posts as $post)
                <div class="card post mb-4">
                    <img class="card-img-top" src="{{ asset('/images/' . $post->photos[0]->photo) }}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title"><a href="{{ route('show', [ 'slug' => $post->slug])}}">{{ $post->title }}</a></h2>
                        <div class="text-justify">
                            {!! Str::limit($post->body, 400) !!}
                        </div>
                        <a href="{{ route('show', [ 'slug' => $post->slug])}}" class="btn btn-primary">Leia Mais &rarr;</a>
                    </div>
                    <div class="card-footer col text-muted">
                            <div class="row">
                                Postado em {{ $post->created_at }} por
                                <a href="#" class="ml-1">{{ $post->user->name }}</a>
                            </div>
                            <div class="row tags">
                                <span class="mt-1">Tags:</span>
                                @foreach ($post->tags as $tag)
                                    <a class="m-1" href="{{ route( 'tag', $tag->id ) }}" class="mx-2">{{ $tag->name }}</a>
                                @endforeach
                            </div>
                    </div>
                </div>
            @endforeach

            <!-- Pagination -->
            <div class="row justify-content-md-center">
                <div class="col-2">
                    {{ $posts->links() }}
                </div>
            </div>
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

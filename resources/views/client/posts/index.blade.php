@extends('layouts.app')

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Blog Post -->
            @foreach ($posts as $post)
                <div class="card border-0 mb-4">
                    <h2 class="card-title text-center mt-5 mb-4"><a class="text-uppercase text" href="{{ route('show', [ 'slug' => $post->slug])}}">{{ $post->title }}</a></h2>
                    <img class="card-img-top rounded-0" src="{{ asset('images/' . $post->photos[0]->photo) }}" alt="Card image cap">
                    <div class="card-body">
                        <div class="text-justify m-0">
                            {!! Str::limit($post->body, 400) !!}
                        </div>
                        <div class="text-right">
                            <a href="{{ route('show', [ 'slug' => $post->slug])}}" class="btn btn-primary">Leia Mais &rarr;</a>
                        </div>
                    </div>
                    <div class="card-footer col">
                        <div class="row">
                            Postado em {{ $post->created_at }} por
                            <a href="#" class="ml-1">{{ $post->user->name }}</a>
                        </div>
                        <div class="row">
                            <span class="mt-1">Tags:</span>
                            @foreach ($post->tags as $tag)
                                <a class="m-1 tags rounded" href="{{ route( 'tag', $tag->id ) }}" class="mx-2">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <hr>
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

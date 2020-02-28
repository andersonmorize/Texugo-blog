@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-dark h2 text-center">Criação de Posts</h2>
    <hr>
    <form id="form-post-create" action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="h5">Título</label>
            <input id="title" class="form-control" type="text" name="title">
            @if( $errors->has('title') )
                <span class="invalid-feedback">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label class="h5">Upload de fotos</label>
            <input id="photos" type="file" name="photos[]" class="form-control-file" multiple>
            <small class="form-text text-muted">
                <p>
                    <span class="text-danger">Obs: </span>
                    A foto será salva com o nome original para facilitar a referencia dentro do html.
                    <span class="text-danger">Cuidado com o conflito dos nomes</span>
                </p>
                <p>
                    <span class="text-danger">Exemplo img: </span>
                    &lt;img class="img-fluid" src="/images/exemplo.jpg" &gt;
                </p>
            </small>
        </div>
        <div class="form-group">
            <label for="body" class="h5">Corpo</label>
            <textarea id="body" class="form-control" cols="30" rows="50" name="body"></textarea>
            @if( $errors->has('body') )
                <span class="invalid-feedback">
                    {{ $errors->first('body') }}
                </span>
            @endif
        </div>
        <div class="form-group row">
            <p for="tags" class="h5 col-2">Tags</p>
            <div class="col">
                @foreach ($tags as $t)
                    <div class="form-check">
                        <input id="tags" class="form-check-input" type="checkbox" value="{{ $t->id }}" id="{{$t->id}}" name="tags[]">
                        <label class="form-check-label" for="{{$t->id}}">
                            {{ $t->name }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        <button id="btn-save-post" type="button" class="btn btn-lg btn-primary float-right mb-4">Submeter Post</button>
    </form>
</div>
@endsection

{{-- Text Editor --}}
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    // comando para recuperar o valor do CKEDITOR
    // CKEDITOR.instances.valueOf('a').body.getData();
    setTimeout(function(){
        CKEDITOR.replace( 'body' );
    }, 100);
</script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="{{ asset('js/post.js')}}"></script>

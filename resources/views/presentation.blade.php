@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10 post">
                <!--
                <figure class="text-center">
                    <img class="rounded img-fluid" src="{{ asset('/images/poder-da-comunicacao.png') }}" alt="Comunicação é poder">
                    <figcaption><a href="https://blog.runrun.it/poder-de-persuasao/">fonte</a></figcaption>
                </figure>
                -->
                <iframe width="100%" height="400" src="https://www.youtube.com/embed/Kqud3JLs3iQ?autoplay=1" frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <h2 class="text-center">Oi meu chapa</h2>
                <div class="mx-5">
                    <p class="text-justify">Texugo é meu pseudônimo, surgiu junto com meu ingresso na programação,
                        e achei justo que esse blog recebesse este nome.
                    </p>
                    <p class="text-justify">O texugo.com foi publicado como demostração de poder e de transferencia do mesmo. Afinal
                        de contas, é mais simples encontrar um site no meio de quase <a href="https://www.internetlivestats.com/" target="_blank">
                        2 bilhões</a>, do que uma pessoa entre quase <a href="https://www.worldometers.info/br/" target="_blank">8 bilhões</a>
                        Abordando temas centrado na programação com enfoque no desenvolvimento de websites, procuro transmitir
                        conhecimento gratuito e adquirir mais experiencia no decorrer dessa jornada.
                    </p>
                    <p class="text-justify">Erguido em php e com diversas ferramentas desenvolvidas com essa linguagem como padrão.
                        Texugo.com furgiu com a finalidade de ser um portal de informação aqui na internet, que contribuirá para o
                        crescimento da mesma, disceminando conteudo com base no meio virtual. <small class="text-muted">E pra ver se o Texugo consegue
                        mais trabalhos. hahaha!!!</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection

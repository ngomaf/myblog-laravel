@extends('site.layout')
@section('title', 'Começo')
@section('content')

        <section id="top">
            <h2>My blog</h2>
            <p>Olá seja bem vindo ao meu blog</p>
        </section>

        <section id="posts">
            <h2>Artigos mais recentes</h2>
            <div class="recents">
                @foreach ($posts4 as $post)
                    <article>
                        <a href="/{{ $post->slug }}"><h1>{{ \Illuminate\Support\Str::limit($post->title, 50) }}</h1></a>
                        <p><span>by</span> <a class="link-default" href="/autor/{{ $post->user_id }}">{{ $post->firstName }}</a> | {{ date('d.m.Y', strtotime($post->created_at)) }} | {{ number_format($post->views, 0, ',', '.') }} views</p>
                        <a href="/{{ $post->slug }}"><p>{{ $post->title }}.</p></a>
                    </article>
                @endforeach
            </div>
            <div class="others">
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
                <article>
                    <a href="#">
                        <h1>Titulo do artigo</h1>
                        <p><span>T</span> 2 horas de leitura | 20 Set 2025</p>
                    </a>
                </article>
            </div>
        </section>

        <section id="categories">
            <h2>Categorias</h2>
        </section>

        <section id="photos">
            <h2>Fotos</h2>
        </section>

@endsection
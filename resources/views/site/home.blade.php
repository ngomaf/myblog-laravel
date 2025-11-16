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
                        <a href="/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
                        <p><span>by</span> <a class="link-default" href="/autor/{{ $post->user_id }}">{{ $post->firstName }}</a> | {{ dateFormatter($post->created_at) }} | {{ number_format($post->views, 0, ',', '.') }} views</p>
                        <a href="/{{ $post->slug }}"><p>{{ catPhrase($post->content, 100, true) }}</p></a>
                    </article>
                @endforeach
            </div>
        </section>

        <section id="categories">
            <h2>Categorias</h2>

            <ul>
                @foreach ($categories as $category)
                    <li>
                    <a href="/categoria/{{ $category->slug }}">
                        <h3>{{ ucfirst($category->name) }}</h3>
                        <p>{{ $category->description }}</p>
                    </a>
                    </li>
                @endforeach
            </ul>
        </section>

        <section id="categories">
            <h2>Fotos</h2>

            <ul>
                @foreach ($categories as $category)
                    <li><img @style("width=100%") src="{{ asset('fortwork_250.png') }}" alt="logo"></li>
                @endforeach
                <li><img @style("width=100%") src="{{ asset('fortwork_250.png') }}" alt="logo"></li>
            </ul>
        </section>

        <section id="photos">
        </section>

@endsection
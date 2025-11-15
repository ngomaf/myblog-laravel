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
                        @php 
                            $created_at = \Carbon\Carbon::parse($post->created_at)->format('d M Y');
                            $content = strip_tags($post->content);
                        @endphp
                        <a href="/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
                        <p><span>by</span> <a class="link-default" href="/autor/{{ $post->user_id }}">{{ $post->firstName }}</a> | {{ $created_at }} | {{ number_format($post->views, 0, ',', '.') }} views</p>
                        <a href="/{{ $post->slug }}"><p>{{ \Illuminate\Support\Str::limit($content, 100, ' ...') }}</p></a>
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

        <section id="photos">
            <h2>Fotos</h2>
        </section>

@endsection
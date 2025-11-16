@extends('site.layout')
@section('title', "{$author->firstName} {$author->lastName} - Autor ")
@section('content')
    <section class="top">
        <h2>{{ $author->firstName }} {{ $author->lastName }}</h2>
        <p>{{ $author->email }}</p>
    </section>

    <section id="posts">
        <h2>Artigos do autor</h2>
        
        <div class="recents">
            @foreach ($posts as $post)
                <article>
                    <a href="/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
                    <p title="Categoria"><a class="link-default" href="/categoria/{{ $post->cat_slug }}">{{ ucfirst($post->cat_name) }}</a> | {{ dateFormatter($post->created_at) }} | {{ number_format($post->views, 0, ',', '.') }} views</p>
                    <a href="/{{ $post->slug }}"><p>{{ catPhrase($post->content, 100, true) }}</p></a>
                </article>
            @endforeach
        </div>

        {{ $posts->links('pagination::simple-default') }}
    </section>
@endsection
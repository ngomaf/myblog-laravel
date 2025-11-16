@extends('site.layout')
@section('title', $category->name . ' - categoria ')
@section('content')

    <section class="top" @style("max-width: 550px")>
        <h2>{{ ucfirst($category->name) }}</h2>
        <p>{{ $category->description }}</p>
    </section>

    <section  id="posts">
        <h2>Artigos da cateroria</h2>
        
        <div class="recents">
            @foreach ($posts as $post)
                <article>
                    <a href="/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
                    <p><span>by</span> <a class="link-default" href="/autor/{{ $post->user_id }}">{{ $post->firstName }}</a> | {{ dateFormatter($post->created_at) }} | {{ number_format($post->views, 0, ',', '.') }} views</p>
                    <a href="/{{ $post->slug }}"><p>{{ catPhrase($post->content, 100, true) }}</p></a>
                </article>
            @endforeach
        </div>

        {{ $posts->links('pagination::simple-default') }}
    </section>
@endsection
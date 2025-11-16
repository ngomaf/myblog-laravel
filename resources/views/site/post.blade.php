@extends('site.layout')
@section('title', $post->title)
@section('content')

    <article>
        <h1>{{ $post->title }}</h1>
        <p><span>by</span> <a class="link-default" href="/autor/{{ $post->user_id }}">{{ $post->firstName }} {{ $post->lastName }}</a> | <span>Categoria</span> <a class="link-default" href="/categoria/{{ $post->cat_slug }}">{{ ucfirst($post->cat_name) }}</a> | {{ dateFormatter($post->created_at) }} | {{ number_format($post->views, 0, ',', '.') }} views</p>

        <br>
        
        {!! $post->content !!}

    </article>

@endsection
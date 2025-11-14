@extends('site.layout')
@section('title', 'Artigos')
@section('content')

        <section id="top">
            <h2>Artigos</h2>
            <p>Veja aqui todos os artigos do blog</p>
        </section>

        <section id="posts">
            <h2></h2>
            <div class="recents">
                @foreach ($pages as $post)
                    <article>
                        <a href="/{{ $post->slug }}">
                            <h1>{{ \Illuminate\Support\Str::limit($post->title, 50) }}</h1>
                            <p>{{ $post->created_at->format('d M Y') }} | {{ number_format($post->views, 0, ',', '.') }}</p>
                            <p>{{ $post->title }}</p>
                        </a>
                    </article>
                @endforeach
            </div>

            {{ $pages->links('pagination::simple-default') }}

            {{-- <div class="pagination">
                <p><a href="#"><<</a><a href="#"><</a>1/20<a href="#">></a><a href="#">>></a></p>
            </div> --}}
        </section>

@endsection
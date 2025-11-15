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
                        @php 
                            $created_at = \Carbon\Carbon::parse($post->created_at)->format('d M Y');
                            $content = strip_tags($post->content);
                        @endphp
                        <a href="/{{ $post->slug }}"><h1>{{ $post->title }}</h1></a>
                        <p><span>by</span> <a class="link-default" href="/autor/{{ $post->user_id }}">{{ $post->firstName }}</a> | {{ $created_at }} | {{ number_format($post->views, 0, ',', '.') }} views</p>
                        <a href="/{{ $post->slug }}"><p>{{ \Illuminate\Support\Str::words($content, 15, ' ...') }}</p></a>
                    </article>
                @endforeach
            </div>

            {{ $pages->links('pagination::simple-default') }}

            {{-- <div class="pagination">
                <p><a href="#"><<</a><a href="#"><</a>1/20<a href="#">></a><a href="#">>></a></p>
            </div> --}}
        </section>

@endsection
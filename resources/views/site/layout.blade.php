<!DOCTYPE html>
<html lang="pt-AO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('fortwork_250.png') }}" rel="icon" type="image/png" />
    {{-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
</head>
<body>
    <header>
        <h1><a href="/">{{ config('app.name', 'Laravel') }}</a></h1>

        <nav>
            <ul>
                <li><a href="/">Começo</a></li>
                <li><a href="{{ url('/artigos') }}">Artigos</a></li>
                <li>
                    <a href="#">Categorias</a>
                    <ul>
                        @foreach (getCat() as $category)
                            <li><a href="/categoria/{{ $category->slug }}">{{ ucfirst($category->name) }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li><a href="{{ url('/sobre') }}">Sobre</a></li>
            </ul>
        </nav>
    </header>
    <main>
        
        @yield('content')

    </main>
    <footer>
        <p>&copy; myblog 2025 - @php echo date("Y") @endphp</p>
    </footer>
</body>
</html>
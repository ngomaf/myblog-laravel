<!DOCTYPE html>
<html lang="pt-AO">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <style>
        *{margin: 0; padding: 0; box-sizing: border-box;}
        body {padding: 20px 50px 50px; line-height: 30px; color: #333; font: 14px "Lucida Grande", Helvetica, Arial, sans-serif;}
        h1, h2 {margin: 25px 0 10px;}
        p, li {margin-bottom: 10px}
        a, .link-default {color: #00defb}
        a:hover, .link-default:hover {color: #21c2d7; text-decoration: underline;}

        header {display: flex; justify-content: space-between; align-items: center;}
        header h1 {margin: 0;}
        header h1 a {text-decoration: none; color: #333;}
        header h1:hover a {text-decoration: underline; color: #333;}

        header ul {display: flex; list-style: none;}
        header ul a {display: block; padding: 20px; color: #0f7987; text-decoration: none}
        header ul a:hover {text-decoration: underline;}
        header ul ul {display: none;}

        main {overflow: auto; margin: 0 0 30px;}

        #posts div {display: flex; gap: 20px; flex-wrap: wrap;}
        #posts div article {flex: 1 1 300px;}
        #posts div article h1 {margin: 0 0 10px;}
        #posts div article a {text-decoration: none; color: #333}
        #posts div article .link-default {text-decoration: none; color: #00defb}
        #posts div article .link-default:hover {text-decoration: underline; color: #3f9eab}
        #posts div article p:nth-child(2) {color: #666}
        #posts div article:hover p:nth-child(2) {color: #3f9eab}
        #posts div article:hover h1,
        #posts div article:hover p:last-child {color: #0f7987}

        #posts .others {margin: 30px 0 0}
        #posts .others article {flex: 1 1 200px;}
        #posts .others article h1 {font-size: 18pt}

        /* .pagination {display: flex; margin-top: 30px}
        .pagination p {margin: 0 auto; text-align: center;}
        .pagination a {text-decoration: none; margin: 5px; font-size: 16pt; font-weight: bold; display: inline-block; width: 40px; height: 40px; background: #00defb; color: #0f7987; border-radius: 50%; padding: 7px 0 0}
        .pagination a:hover {background: #0f7987; color: #fff;} */

        /* pagination */
        .pagination {
            display: flex;
            list-style: none;
            padding: 0;
            gap: 8px; /* Espaçamento entre os links */
            justify-content: center;
            margin-top: 20px;
        }

        /* Cada item da paginação */
        .pagination li {
        }

        /* Links da paginação */
        .pagination li a,
        .pagination li span {
            display: block;
            padding: 8px 12px;
            color: #007bff; /* Azul padrão */
            text-decoration: none;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        /* Hover nos links */
        .pagination li a:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Página ativa */
        .pagination li.active span {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        /* Desabilitado (não clicável) */
        .pagination li.disabled span {
            color: #6c757d;
            cursor: not-allowed;
            background-color: #f8f9fa;
            border-color: #dee2e6;
        }
    </style>
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
                        <li><a href="#">Categoria A</a></li>
                        <li><a href="#">Categoria B</a></li>
                        <li><a href="#">Categoria C</a></li>
                        <li><a href="#">Categoria D</a></li>
                        <li><a href="#">Categoria E</a></li>
                        <li><a href="#">Categoria F</a></li>
                        <li><a href="#">Categoria G</a></li>
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
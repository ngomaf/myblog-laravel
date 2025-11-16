@extends('site.layout')
@section('title', 'Sobre')
@section('content')

        <section id="top">
            <h2>Sobre</h2>
            <p>Olá seja bem vindo ao meu blog</p>
        </section>

        <section>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident aut, rerum voluptate iste illum eius possimus non, perferendis magni qui doloribus molestiae ullam sequi ducimus suscipit ut unde consequatur necessitatibus in. Eius totam reiciendis ratione dolores neque dolorum ut ex cum necessitatibus dolorem, dolore iste tempora cumque repudiandae earum sapiente.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident aut, rerum voluptate iste illum eius possimus non, perferendis magni qui doloribus molestiae ullam sequi ducimus suscipit ut unde consequatur necessitatibus in. Eius totam reiciendis ratione dolores neque dolorum ut ex cum necessitatibus dolorem, dolore iste tempora cumque repudiandae earum sapiente.</p>
        </section>

        <section>
            <table class="tb-default">
                <caption>Dados do {{ config('app.name', 'Laravel') }}</caption>
                <colgroup>
                    <col width="10%">
                    <col width="40%">
                    <col width="50%">
                </colgroup>
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Titulo</td>
                        <td>Dado</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>A</td>
                        <td>Nome</td>
                        <td>{{ config('app.name', 'Laravel') }}</td>
                    </tr>
                    <tr>
                        <td>B</td>
                        <td>Criação</td>
                        <td>Nov 2025</td>
                    </tr>
                    <tr>
                        <td>C</td>
                        <td>Artigos</td>
                        <td>{{ number_format($totPosts, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>D</td>
                        <td>Categorias</td>
                        <td>{{ number_format($totCats, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>E</td>
                        <td>Autores</td>
                        <td>{{ number_format($totAuthors, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>F</td>
                        <td>Vizitas</td>
                        <td>{{ number_format($totViews, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td>G</td>
                        <td>Logo</td>
                        <td><img @style("width=10px") src="{{ asset('fortwork_250.png') }}" alt="logo"></td>
                    </tr>
                </tbody>
            </table>
        </section>

@endsection
@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>Tópicos</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sistemas de Informação</a></li>
            <li class="breadcrumb-item active">Duvidas</li>
        </ol>
        <table class="table table-striped table-right-aligned">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Respostas</th>
                    <th>Visto</th>
                    <th>Autor</th>
                    <th>Ultima Mensagem</th>
                </tr>
            </thead>
            <tbody>
                @for($i=0; $i<20; $i++)
                    <tr>
                        <td>
                            <a href="#">Como prevenir SQL Injection na minha aplicação web?</a>
                        </td>
                        <td>
                            10
                        </td>
                        <td>
                            Roberto
                        </td>
                        <td>
                            45
                        </td>
                        <td>
                            1h atrás por José
                        </td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection
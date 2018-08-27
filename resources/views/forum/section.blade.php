@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>{{ $section->title }}</h1>

        <h3 class="forum__course-name">
            {{ $section->subtitle }}
        </h3>

        <div class="form-group">
            <a class="btn btn-primary btn-sm" style="margin-top: -5px" href="{{ route('forum.newPost', ['id' => $classroom->id, 'sid' => $section->id]) }}">
                <i class="fa fa-plus"></i> Criar Tópico
            </a>
            <button class="btn btn-primary btn-sm" style="margin-top: -5px">
                <i class="fa fa-filter"></i> Filtros
            </button>
        </div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sistemas de Informação</a></li>
            <li class="breadcrumb-item active">{{ $section->title }}</li>
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
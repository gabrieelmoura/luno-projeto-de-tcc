@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>{{ $section->title }}</h1>

        <h3 class="forum__course-name">
            {{ $section->subtitle }}
        </h3>

        <div class="form-group">
            <a class="btn btn-primary btn-sm" style="margin-top: -5px" href="{{ route('forum.newTopic', ['id' => $classroom->id, 'sid' => $section->id]) }}">
                <i class="fa fa-plus"></i> Criar Tópico
            </a>
            <a class="btn btn-warning btn-sm" style="margin-top: -5px" href="{{ route('forum.newTopic', ['id' => $classroom->id, 'sid' => $section->id]) }}">
                <i class="fa fa-pencil"></i> Editar Sessão
            </a>
            <a class="btn btn-danger btn-sm" style="margin-top: -5px" href="{{ route('forum.newTopic', ['id' => $classroom->id, 'sid' => $section->id]) }}">
                <i class="fa fa-trash"></i> Deletar Sessão
            </a>
            <!-- <button class="btn btn-primary btn-sm" style="margin-top: -5px">
                <i class="fa fa-filter"></i> Filtros
            </button> -->
        </div>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('forum.home', ['id' => $classroom->id]) }}">{{ $classroom->description }}</a></li>
            <li class="breadcrumb-item active">{{ $section->title }}</li>
        </ol>

        <table class="table table-striped table-right-aligned">
            <thead>
                <tr>
                    <th>Título</th>
                    <th style="text-align: center;">Respostas</th>
                    <th style="text-align: center;">Autor</th>
                    <th style="text-align: right;">Ultima Mensagem</th>
                </tr>
            </thead>
            <tbody>
                @foreach($section->topics as $topic)
                    <tr>
                        <td>
                            <a href="{{ route('forum.topic', ['id' => $classroom->id, 'sid' => $section->id, 'tid' => $topic->id]) }}">{{ $topic->title }}</a>
                        </td>
                        <td style="text-align: center;">
                            {{ $topic->posts_count }}
                        </td>
                        <td style="text-align: center;">
                            <a href="{{ route('site.user', ['id' => $topic->creator->id]) }}">{{ $topic->creator->user_name }}</a>
                        </td>
                        <td style="text-align: right;">
                            {{ $topic->lastPost->created_at->diffForHumans() }} por {{ $topic->lastPost->creator->user_name }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
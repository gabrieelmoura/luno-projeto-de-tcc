@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Novo Post
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">Sessão</label>
                <input class="form-control" type="text" value="{{ $section->title }}" placeholder="Nome da sessão" disabled>
            </div>
            <div class="form-group">
                <label class="control-label">Tópico</label>
                @if($topic)
                    <input class="form-control" type="text" name="topic_title" value="{{ $topic->title }}" placeholder="Nome do novo tópico" disabled>
                @else
                    <input class="form-control" type="text" name="topic_title" value="" placeholder="Nome do novo tópico" required>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">Conteúdo</label>
                <textarea rows="10" class="form-control" name="content" required></textarea>
            </div>
            <!-- <tabela-de-anexos></tabela-de-anexos> -->
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit" name="button">
                    Criar Post!
                </button>
            </div>
        </form>
    </div>
@endsection

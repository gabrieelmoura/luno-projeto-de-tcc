@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Editar {{ $chapter->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="control-label">Título</label>
                <input type="text" name="title" value="{{ $chapter->title }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="control-label">Conteúdo</label>
                <textarea name="content" class="form-control" required>{{ $chapter->content }}</textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Arquivo</label><br>
                <input type="file" name="media">
            </div>
            <input type="submit" value="Enviar" class="btn btn-primary">
        </form>
    </div>
@endsection
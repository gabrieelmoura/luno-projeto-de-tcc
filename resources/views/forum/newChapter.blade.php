@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Postar Material
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">Título</label>
                <input class="form-control" type="text" name="title" value="">
            </div>
            <div class="form-group">
                <label class="control-label">Conteúdo</label>
                <textarea rows="10" class="form-control" name="content"></textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="button">
                    Criar Material!
                </button>
            </div>
        </form>
    </div>
@endsection

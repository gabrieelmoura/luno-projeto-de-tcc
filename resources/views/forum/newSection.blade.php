@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Nova Sessão
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">Título</label>
                <input class="form-control" type="text" name="title" value="" required>
            </div>
            <div class="form-group">
                <label class="control-label">Sub Título</label>
                <input class="form-control" type="text" name="subtitle" value="" required>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit" name="button">
                    Criar Sessão!
                </button>
            </div>
        </form>
    </div>
@endsection

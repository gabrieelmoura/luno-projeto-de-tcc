@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Editar {{ $section->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">Título</label>
                <input class="form-control" type="text" name="title" value="{{ $section->title }}">
            </div>
            <div class="form-group">
                <label class="control-label">Sub Título</label>
                <input class="form-control" type="text" name="subtitle" value="{{ $section->subtitle }}">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit" name="button">
                    Editar Sessão!
                </button>
            </div>
        </form>
    </div>
@endsection

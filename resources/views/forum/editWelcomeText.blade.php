@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Editar quadro de avisos
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <textarea rows="15" name="welcome_text" class="form-control">{{ $classroom->welcome_text }}</textarea>
            </div>
            <button class="btn btn-primary">Atualizar</button>
        </form>
    </div>
@endsection
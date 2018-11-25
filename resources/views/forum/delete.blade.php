@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Deletar Turma
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        Realmente deseja apagar esta turma?
        <br><br>
        <form method="POST" style="display: inline-block">
            @csrf
            <div class="form-group">
                <button class="btn btn-danger" type="submit" name="button">
                    Sim
                </button>
            </div>
        </form>
        <a class="btn btn-primary" href="{{ route('forum.home', ['id' => $classroom->id]) }}">Não</a>
    </div>
@endsection

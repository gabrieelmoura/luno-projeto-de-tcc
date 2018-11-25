@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Deletar {{ $section->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $section->description }}
        </h3>
        <div>
            Realmente deseja deletar a sessão {{ $section->title }}?
            <div style="margin-top: 20px">
                <a class="btn btn-primary" href="{{ route('forum.section', ['id' => $classroom->id, 'sid' => $section->id]) }}">Não</a>
                <form method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="sid" value="{{ $section->id }}">
                    <input type="submit" value="Sim" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
@endsection
@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Deletar seu post?
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            Realmente deseja deletar seu post?
            <div style="margin-top: 20px">
                <a class="btn btn-primary" href="{{ route('forum.topic', ['id' => $classroom->id, 'sid' => $section->id, 'tid' => $topic->id]) }}">Não</a>
                <form method="POST" style="display: inline-block;">
                    @csrf
                    <input type="submit" value="Sim" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
@endsection
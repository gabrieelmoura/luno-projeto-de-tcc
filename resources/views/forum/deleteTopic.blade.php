@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Deletar {{ $topic->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            Realmente deseja deletar o tópico <strong>{{ $topic->title }}</strong>?
            <div style="margin-top: 20px">
                <a class="btn btn-primary" href="{{ route('forum.topic', ['id' => $classroom->id, 'tid' => $topic->id, 'sid' => $topic->section_id]) }}">Não</a>
                <form method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="tid" value="{{ $topic->id }}">
                    <input type="submit" value="Sim" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
@endsection
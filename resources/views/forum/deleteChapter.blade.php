@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Deletar {{ $chapter->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            Realmente deseja deletar o material {{ $chapter->title }}?
            <div style="margin-top: 20px">
                <a class="btn btn-primary" href="{{ route('forum.chapter', ['id' => $classroom->id, 'cid' => $chapter->id]) }}">Não</a>
                <form method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="cid" value="{{ $chapter->id }}">
                    <input type="submit" value="Sim" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
@endsection
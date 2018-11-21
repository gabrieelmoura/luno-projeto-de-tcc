@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Deletar {{ $task->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            Realmente deseja deletar a tarefa {{ $task->title }}?
            <div style="margin-top: 20px">
                <a class="btn btn-primary" href="{{ route('forum.task', ['id' => $classroom->id, 'cid' => $task->id]) }}">Não</a>
                <form method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" name="tid" value="{{ $task->id }}">
                    <input type="submit" value="Sim" class="btn btn-danger">
                </form>
            </div>
        </div>
    </div>
@endsection
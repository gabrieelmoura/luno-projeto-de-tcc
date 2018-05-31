@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>Lançar Notas</h1>
        <h3 class="forum__course-name">
            {{ $classroom->subtitle }}
        </h3>
        <table class="table">
            <tbody>
                @forelse($classroom->tasks as $task)
                    <tr>
                        <td style="padding-left: 0; width: 99%">
                            <b>{{ $task->title }}</b>
                        </td>
                        <td style="white-space: nowrap;">
                            {{ $task->pending_count }} entregas novas
                        </td>
                        <td style="padding-right: 0;">
                            <a href="{{ route('forum.taskGrades', ['id' => $classroom->id, 'tid' => $task->id ]) }}" class="btn btn-primary btn-sm">
                                Ver Entregas
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>
                            Não há tarefas para esta turma.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </table>
@endsection
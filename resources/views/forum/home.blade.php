@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            {{ $classroom->course->course_name }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div class="luno-floating-buttons-holder">
            <h2>Quadro de Avisos</h2>
            @if($classroom->podeSerEditadoPor(Auth::user()))
                <div class="luno-floating-buttons">
                    <a href="/forum/{{ $classroom->id }}/editar-quadro" class="btn-sm btn-primary btn">
                        <i class="fa fa-pencil"></i> Editar
                    </a>
                </div>
            @endif
        </div>
        <p>
            {{ $classroom->welcome_text }}
        </p>
        <h2>Tarefas</h2>
        <table class="table">
            <tbody>
                @forelse($classroom->tasks as $task)
                    <tr>
                        <td style="padding-left: 0; width: 99%">
                            {{ $task->title }}
                        </td>
                        <td style="white-space: nowrap;">
                            @if($task->myGrade)
                                {{ $task->myGrade->val }}
                            @else
                                --
                            @endif
                        </td>
                        <td style="white-space: nowrap;">
                            Peso {{ $task->weight }}
                        </td>
                        <td style="white-space: nowrap;">
                            Até {{ $task->deadline->format('d/m/Y') }}
                        </td>
                        <td style="padding-right: 0; white-space: nowrap;">
                            <a href="{{ route('forum.task', ['id' => $classroom->id, 'tid' => $task->id]) }}" class="btn btn-sm btn-primary">Ver Tarefa</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="padding-left: 0; padding-right: 0">
                            Nenhuma Tarefa
                        </td>
                    </tr>
                @endforelse
                @if($classroom->podeSerEditadoPor(Auth::user()))
                    <tr>
                        <td colspan="5" style="padding-left: 0; padding-right: 0">
                            <a href="{{ route('forum.new-task', ['id' => $classroom->id ]) }}" class="btn-sm btn-success btn">
                                <i class="fa fa-plus"></i> Criar Nova Tarefa
                            </a>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <h2>Fórum</h2>
        <table class="table">
            <tbody>
                @forelse($classroom->sections as $section)
                    <tr>
                        <td style="padding-left: 0;">
                            <a href="{{ route('forum.section', ['id' => $classroom->id, 'sid' => $section->id]) }}">
                                <h4>{{ $section->title }}</h4>
                            </a>
                            {{ $section->subtitle }}
                        </td>
                        <td class="text-right" style="padding-right: 0">
                            {{ $section->topics_count }} tópicos
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="padding-left: 0; padding-right: 0">
                            Este forum ainda não possui nenhuma sessão
                        </td>
                    </tr>
                @endforelse
                @if($classroom->podeSerEditadoPor(Auth::user()))
                    <tr>
                        <td colspan="2" style="padding-left: 0; padding-right: 0">
                            <a href="{{ route('forum.new-section', ['id' => $classroom->id ]) }}" class="btn-sm btn-success btn">
                                <i class="fa fa-plus"></i> Criar Nova Sessão
                            </a>
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection

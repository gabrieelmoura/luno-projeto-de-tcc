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
            <div class="luno-floating-buttons">
                <a href="/forum/{{ $classroom->id }}/editar-quadro" class="btn-sm btn-primary btn">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </div>
        </div>
        <p>
            {{ $classroom->welcome_text }}
        </p>
        <h2>Tarefas</h2>
        <table class="table">
            <tbody>
                @forelse($classroom->tasks as $task)
                    <tr>
                        <td>
                            {{ $task->title }}
                        </td>
                        <td class="text-right">
                            Até {{ $task->deadline->format('d/m/Y') }}
                        </td>
                        <td class="text-right">
                            <a href="#" class="btn btn-sm btn-primary">Ver Tarefa</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">
                            Nenhuma Tarefa
                        </td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="3">
                        <a href="{{ route('forum.new-task', ['id' => $classroom->id ]) }}" class="btn-sm btn-success btn">
                            <i class="fa fa-plus"></i> Criar Nova Tarefa
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h2>Fórum</h2>
        <table class="table">
            <tbody>
                @forelse($classroom->sections as $section)
                    <tr>
                        <td>
                            <a href="{{ route('forum.section', ['id' => $section->id]) }}">
                                <h4>{{ $section->title }}</h4>
                            </a>
                            {{ $section->subtitle }}
                        </td>
                        <td class="text-right" style="vertical-align: middle">
                            {{ $section->topics_count }} posts
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">
                            Este forum ainda não possui nenhuma sessão
                        </td>
                    </tr>
                @endforelse
                <tr>
                    <td colspan="2">
                        <a href="{{ route('forum.new-section', ['id' => $classroom->id ]) }}" class="btn-sm btn-success btn">
                            <i class="fa fa-plus"></i> Criar Nova Sessão
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection

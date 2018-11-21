@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            {{ $task->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            <pre>{{ $task->description }}</pre>
        </div>
        <br>
        <div>
            <table class="table">
                <tbody>
                    <tr>
                        <td style="padding-left: 0; white-space: nowrap;">
                            <b>Peso:</b>
                        </td>
                        <td style="padding-right: 0; width: 99%; text-align: right;">
                            {{ $task->weight }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 0; white-space: nowrap;">
                            <b>Prazo:</b>
                        </td>
                        <td style="padding-right: 0; width: 99%; text-align: right;">
                            {{ $task->deadline->format('d/m/Y') }}
                        </td>
                    </tr>
                    @if($task->myGrade)
                        <tr>
                            <td style="padding-left: 0; white-space: nowrap;">
                                <b>Sua nota:</b>
                            </td>
                            <td style="padding-right: 0; width: 99%; text-align: right;">
                                {{ $task->myGrade->val or 'O professor ainda não avaliou a tarefa' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-left: 0; white-space: nowrap;">
                                <b>Entregue em:</b>
                            </td>
                            <td style="padding-right: 0; width: 99%; text-align: right;">
                                {{ $task->myGrade->created_at->format('d/m/Y h:i')}}
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        @if(!$task->myGrade)
            <br>
            <h2>Entregar</h2>
            <form method="POST" enctype="multipart/form-data" action="{{ route('forum.task-submit', ['id' => $classroom->id]) }}">
                {{ csrf_field() }}
                <input type="hidden" name="task_id" value="{{ $task->id }}">
                @if(strpos($task->delivery_form, 'M') !== false)
                    <div class="form-group">
                        <label>Mensagem</label>
                        <textarea class="form-control" name="msg"></textarea>
                    </div>
                @endif
                @if(strpos($task->delivery_form, 'F') !== false)
                    <div class="form-group">
                        <label>Arquivo</label><br>
                        <input type="file" name="media">
                    </div>
                @endif
                <button class="btn btn-primary">Entregar!</button>
            </form>
        @else
            <br>
            <h2>Sua Entrega</h2>
            <div>
                <p>{{ $task->myGrade->msg }}</p>
                @if($task->myGrade->media)
                    <div style="margin-top: 20px">
                        <a download href="{{ route('storage.grade', ['id' => $task->myGrade->id]) }}" class="btn btn-primary">
                            <i class="fa fa-download"></i> Download
                        </a>
                    </div>
                @endif
            </div>
        @endif
        <br>
        <h2>Ações</h2>
        <div>
            <a href="{{ route('forum.edit-task', ['id' => $classroom->id, 'tid' => $task->id]) }}" class="btn btn-primary">Editar</a>
            <a href="{{ route('forum.delete-task', ['id' => $classroom->id, 'tid' => $task->id]) }}" class="btn btn-danger">Deletar</a>
        </div>
    </div>
@endsection
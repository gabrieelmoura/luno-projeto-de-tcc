@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Nova Tarefa
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">Título*</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label class="control-label">Descrição</label>
                <textarea class="form-control" name="description" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Prazo</label>
                <input type="date" name="deadline" class="form-control">
                <small class="form-text text-muted">
                    Cabe ao professor aceitar o trabalho após o prazo ou não.
                    Esta data é apenas uma referência para o aluno.
                </small>
            </div>
            <div class="form-group">
                <label class="control-label">Peso</label>
                <input type="text" name="weight" class="form-control">
                <small class="form-text text-muted">
                    Quando o aluno entrega a atividade, o professor avalia com uma nota de 0 até 10.
                    A média final do aluno na turma é ponderada usando o peso de cada tarefa.
                </small>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary" type="submit" name="button">
                    Criar Tarefa!
                </button>
            </div>
        </form>
    </div>
@endsection

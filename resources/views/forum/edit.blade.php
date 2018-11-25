@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Editar Turma
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">Descrição*</label>
                <input type="text" name="description" class="form-control" value="{{ $classroom->description }}">
                <small class="form-text text-muted">
                    Ex: Turma 1001
                </small>
            </div>
            <div class="form-group">
                <label class="control-label">Início*</label>
                <input type="date" name="start_date" class="form-control" value="{{ $classroom->start_date ? $classroom->start_date->format('Y-m-d') : '' }}">
                <small class="form-text text-muted">
                    Data onde as atividades da turma começam
                </small>
            </div>
            <div class="form-group">
                <label class="control-label">Fim*</label>
                <input type="date" name="end_date" class="form-control" value="{{ $classroom->end_date ? $classroom->end_date->format('Y-m-d') : '' }}">
                <small class="form-text text-muted">
                    Data onde as atividades da turma terminam
                </small>
            </div>
            <div class="form-group">
                <label class="control-label">Máximo de alunos*</label>
                <input type="number" name="max_students" class="form-control" value="{{ $classroom->max_students }}">
                <small class="form-text text-muted">
                    Este número não determina quantos alunos podem entrar na turma, é apenas um indicador para os visitantes do site
                </small>
            </div>
            <div class="form-group" style="padding-top: 10px">
                <input type="checkbox" name="hidden">
                <label>Mostrar no site e em buscas?</label>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">
                    Atualizar Turma
                </button>
            </div>
        </form>
        <hr>
        <h2>Zona de Perigo</h2>
        <br>
        <a href="{{ route('forum.delete', ['id' => $classroom->id]) }}" class="btn btn-danger">
            <i class="fa fa-trash"></i> Deletar turma
        </a>
    </div>
@endsection

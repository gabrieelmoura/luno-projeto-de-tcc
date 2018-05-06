@extends('site.layout')

@section('site.content')
    <div class="luno-top-banner luno-top-banner-new-classroom">
        <div class="luno-top-banner__content"></div>
    </div>
    <div class="luno-content">
        <h1 class="luno-title">Criar Nova Turma</h1>
        <form method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="course_id" value="{{ $course->id }}">
            <div class="form-group">
                <label class="control-label">Curso*</label>
                <input type="text" name="" readonly class="form-control" value="{{ $course->course_name }}">
            </div>
            <div class="form-group">
                <label class="control-label">Descrição*</label>
                <input type="text" name="description" class="form-control">
                <small class="form-text text-muted">
                    Ex: Turma 1001
                </small>
            </div>
            <div class="form-group">
                <label class="control-label">Início*</label>
                <input type="date" name="start_date" class="form-control">
                <small class="form-text text-muted">
                    Data onde as atividades da turma começam
                </small>
            </div>
            <div class="form-group">
                <label class="control-label">Fim*</label>
                <input type="date" name="end_date" class="form-control">
                <small class="form-text text-muted">
                    Data onde as atividades da turma terminam
                </small>
            </div>
            <div class="form-group">
                <label class="control-label">Máximo de alunos*</label>
                <input type="number" name="max_students" class="form-control" value="40">
                <small class="form-text text-muted">
                    Este número não determina quantos alunos podem entrar na turma, é apenas um indicador para os visitantes do site
                </small>
            </div>
            <div class="form-group" style="padding-top: 10px">
                <input type="checkbox" name="hidden" checked>
                <label>Mostrar no site e em buscas?</label>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary">
                    Criar Turma!
                </button>
            </div>
        </form>
    </div>
@endsection

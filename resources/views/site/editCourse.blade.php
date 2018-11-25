@extends('site.layout')

@section('site.content')
    <section id="novo-curso">
        <div class="luno-top-banner luno-top-banner-new-course">
            <div class="luno-top-banner__content"></div>
        </div>
        <div class="luno-content">
            <h1 class="luno-title">Editar Curso</h1>
            <form method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="control-label">
                        Título*
                    </label>
                    <input type="text" class="form-control" name="course_name" value="{{ $course->course_name }}">
                    <small class="form-text text-muted">
                        Escolha um título que ajude os usuários a encontrar o curso no site.
                    </small>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Sub título
                    </label>
                    <input type="text" class="form-control" name="subtitle" value="{{ $course->subtitle }}">
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Descrição*
                    </label>
                    <textarea class="form-control" rows="10" name="description">{{ $course->description }}</textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Imagem
                    </label><br>
                    <input type="file" name="image">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary">
                        Editar Curso!
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
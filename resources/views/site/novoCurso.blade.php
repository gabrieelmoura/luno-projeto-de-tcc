@extends('site.layout')

@section('site.content')
    <section id="novo-curso">
        <div class="luno-top-banner luno-top-banner-new-course">
            <div class="luno-top-banner__content"></div>
        </div>
        <div class="luno-content">
            <h1 class="luno-title">Novo Curso</h1>
            <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label">
                        Título*
                    </label>
                    <input type="text" class="form-control" name="course_name" required>
                    <small class="form-text text-muted">
                        Escolha um título que ajude os usuários a encontrar o curso no site.
                    </small>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Sub título*
                    </label>
                    <input type="text" class="form-control" name="subtitle" required>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Descrição*
                    </label>
                    <textarea class="form-control" rows="10" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label class="control-label">
                        Imagem
                    </label><br>
                    <input type="file" name="image">
                </div>
                <div class="form-group" style="padding-top: 10px">
                    <input id="accept-terms-input" type="checkbox" style="vertical-align: middle;" name="accept">
                    <label for="accept-terms-input">
                        Concordo com os termos de uso da comunidade Luno
                    </label>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary">
                        Criar Curso!
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
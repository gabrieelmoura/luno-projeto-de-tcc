@extends('site.layout')

@section('site.content')
    <section id="novo-curso">
        <div class="luno-top-banner luno-top-banner-new-course">
            <div class="luno-top-banner__content"></div>
        </div>
        <div class="luno-content">
            <h1 class="luno-title">Deletar Curso {{ $course->course_name }}</h1>
            <p>
                Realmente deseja deletar o curso? Isso fará com que todas as informações
                realtivas ao curso sejam apagadas, como turmas, relatórios de alunos, avaliações e etc.<br>
                Será que você gostaria de apenas <a href="#">oculta-lo</a>?
            </p>
            <form method="POST">
                @csrf
                <div class="form-group text-center">
                    <a href="{{ route('site.course', ['id' => $course->id]) }}" class="btn btn-primary pull-left">
                        Voltar
                    </a>
                    <button class="btn btn-danger pull-right">
                        Deletar Curso!
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
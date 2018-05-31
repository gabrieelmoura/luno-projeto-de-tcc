@extends('site.layout')

@section('site.content')
    <section id="homebanner">
        <span id="homebanner__line1">Aprenda e Ensine</span>
        <span id="homebanner__line2">de onde quer que esteja</span>
    </section>
    <section id="homefeatured" class="clearfix">
        <h1>Aqui no Luno você:</h1>
        <ul>
            <li><i class="fa fa-check"></i> Estuda de onde estiver</li>
            <li><i class="fa fa-check"></i> Pode entrar em contato com o professor 24 horas por dia</li>
            <li><i class="fa fa-check"></i> Possui fórum de duvidas e discussões</li>
        </ul>
        <ul>
            <li><i class="fa fa-check"></i> Gera seu certificado de conclusão</li>
            <li><i class="fa fa-check"></i> Acompanha vários cursos com uma única conta</li>
            <li><i class="fa fa-check"></i> É notificado por e-mail de todas as atividades</li>
        </ul>
    </section>
    <section id="classrooms" class="clearfix">
        <h1>Cursos em Destaque</h1>
        <div class="classroom-list">
            @foreach($courses as $course)
                <div class="classroom-box">
                    <img class="classroom-box__featured-img" src="{{ $course->image->location }}">
                    <h2 class="classroom-box__title">{{ $course->course_name }}</h2>
                    <span class="classroom-box__info">Professor <a href="#">{{ $course->creator->user_name }}</a></span>
                    <span class="classroom-box__info">{{ $course->open_classrooms_count }} turmas abertas</span>
                    <div class="classroom-box__actions">
                        <a class="btn btn-primary btn-sm" href="{{ route('site.course', ['id' => $course->id]) }}">Ver Mais</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
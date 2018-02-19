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
        <h1>Turmas em Destaque</h1>
        <div class="classroom-list">
            @for($i = 0; $i < 10; $i++)
                <div class="classroom-box">
                    <img class="classroom-box__featured-img" src="https://www.alertasecurity.com.br/images/Entenda-o-que--Segurana-da-Informao-e-reduza-riscos-na-empresa.png">
                    <h2 class="classroom-box__title">Segurança da Informação</h2>
                    <span class="classroom-box__info">Oferecido por <a href="#">Unigranrio</a></span>
                    <span class="classroom-box__info">Professor <a href="#">Gabriel Moura</a></span>
                    <span class="classroom-box__info">01/01/2018 - 31/06/2018 (6 meses)</span>
                    <span class="classroom-box__info">10/55 <i class="fa fa-users"></i></span>
                    <div class="classroom-box__actions">
                        <a class="btn btn-primary btn-sm" href="#">Matricular-se</a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection
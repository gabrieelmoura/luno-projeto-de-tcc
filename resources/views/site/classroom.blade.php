@extends('site.layout')

@section('site.content')
    <section class="classroom-details">
        <header class="clearfix">
            <img class="classroom-details__front-img" src="https://www.alertasecurity.com.br/images/Entenda-o-que--Segurana-da-Informao-e-reduza-riscos-na-empresa.png">
            <div class="classroom-details__header__content">
                <h1>Segurança da Informação</h1>
                <p>
                    Saiba como manter os dados da sua empresa seguros em um mundo digital.
                </p>
                <div class="classroom-details__infos">
                    <div>
                        Oferecido Por: <a href="#">Unigranrio</a>
                    </div>
                    <div>
                        Período do Curso: De 01/01/2018 até 31/06/2018
                    </div>
                    <div>
                        Participantes: 10/55 <span class="fa fa-users"></span>
                    </div>
                </div>
                <br>
                <a href="#" class="btn btn-primary btn-sm">Matricule-se</a>
            </div>
        </header>
        <main>
            <h2>Sobre</h2>
            <div>
                <p>A segurança da informação (SI) está diretamente relacionada com proteção de um conjunto de informações, no sentido de preservar o valor que possuem para um indivíduo ou uma organização. São propriedades básicas da segurança da informação: confidencialidade, integridade, disponibilidade e autenticidade.</p>
                <p>A SI não está restrita somente a sistemas computacionais, informações eletrônicas ou sistemas de armazenamento. O conceito aplica-se a todos os aspectos de proteção de informações e dados. O conceito de Segurança Informática ou Segurança de Computadores está intimamente relacionado com o de Segurança da Informação, incluindo não apenas a segurança dos dados/informação, mas também a dos sistemas em si.</p>
            </div>
            <h2>Requisitos</h2>
            <div>
                <p>
                    Noções básicas de redes de computadores
                </p>
            </div>
            <h2>Professor</h2>
            <div class="classroom-details__teacher clearfix">
                <img src="/img/teacher.jpg" class="classroom-details__teacher__img">
                <div class="classroom-details__teacher__bio">
                    <h3>Gabriel Moura</h3>
                    <p>
                        Web Developer and Software Tester
                    </p>
                    <p>
                        Trabalha como CEO na empresa Guia Código, consultor e é tutor de cursos de programação. Possuí experiências em desenvolvimento web/mobile com PHP, Javascript, HTML5 e Frameworks como Laravel, Zend, AngularJS, Angular 2, React, Vue, Ionic, Ionic 2 Jquery, Bootstrap e outros. Residente na Cidade de Santa Cruz do Sul no estado do Rio Grande do Sul.
                    </p>
                </div>
            </div>
            <br>
            <h2>Tutores</h2>
            <div>
                <ul>
                    <li>Anderson Nascimento</li>
                    <li>Barbara Oliveira</li>
                    <li>Renan Thiago</li>
                </ul>
            </div>
            <h2>Turmas Relacionadas</h2>
            <div>
                <table class="table">
                    <tbody>
                        @for($i = 0; $i < 5; $i++)
                            <tr>
                                <td>
                                    Segurança da Informação
                                </td>
                                <td>
                                    Gabriel Moura
                                </td>
                                <td>
                                    10/55 <i class="fa fa-users"></i>
                                </td>
                                <td>
                                    01/01/2018 - 10/12/2018 <i class="fa fa-calendar"></i>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </main>
    </section>
@endsection
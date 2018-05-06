@extends('site.layout')

@section('site.content')
    <section class="course-details">
        <header class="clearfix">
            @if($course->image)
                <img class="course-details__front-img" src="{{ $course->image->location }}">
            @endif
            <div class="course-details__header__content">
                <h1>{{ $course->course_name }}</h1>
                <p>
                    {{ $course->subtitle }}
                </p>
                <div class="course-details__infos">
                    <div>
                        Criado Por:
                        @if($course->creator)
                            <a href="#">{{ $course->creator->user_name }}</a>
                        @else
                            Desconhecido
                        @endif
                    </div>
                    <div>
                        Criado Em: {{ $course->created_at->format('d/m/Y') }}
                    </div>
                    <div>
                        Turmas Abertas: {{ $course->openClassrooms->count() }}  <span class="fa fa-users"></span>
                    </div>
                </div>
                <br>
                <div class="course-details__infos">
                    <div>
                        Nota: 10 <span class="fa fa-star"></span> (3 Avaliações)
                    </div>
                </div>
            </div>
        </header>
        <main>
            <h2>Sobre</h2>
            <div class="form-group">{{ $course->description }}</div>
            <h2>Autor</h2>
            @if($course->creator)
                <div class="course-details__teacher clearfix">
                    @if($course->creator->avatar)
                        <img src="{{ $course->creator->avatar->location }}" class="course-details__teacher__img">
                    @endif
                    <div class="course-details__teacher__bio">
                        <h3>{{ $course->creator->user_name }}</h3>
                        <p>
                            {{ $course->creator->job }}
                        </p>
                        <p>
                            {{ $course->creator->about }}
                        </p>
                    </div>
                </div>
            @else
                Desconhecido
            @endif
            <br>
            <h2>Turmas Abertas</h2>
            <div>
                <table class="table">
                    <tbody>
                        @foreach($course->classrooms as $classroom)
                            <tr>
                                <td style="vertical-align: middle;">
                                    {{ $classroom->description }}
                                </td>
                                <td class="text-right" style="width: 100px; vertical-align: middle;">
                                    {{ $classroom->registrations->count() }}/{{ $classroom->max_students }} <i class="fa fa-users"></i>
                                </td>
                                <td class="text-right" style="width: 220px; vertical-align: middle;">
                                    01/01/2018 - 10/12/2018 <i class="fa fa-calendar"></i>
                                </td>
                                <td style="vertical-align: middle; width: 60px">
                                    <a href="#" class="btn btn-sm btn-primary">
                                        Matricular-se
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <h2>Ações</h2>
            <div>
                <hr>
                <a href="#" class="btn btn-primary btn-sm">Editar Curso</a>
                <a href="#" class="btn btn-primary btn-sm">Ocultar Curso</a>
                <a href="/nova-turma/{{ $course->id }}" class="btn btn-primary btn-sm">Criar Nova Turma</a>
                <hr>
                <a href="#" class="btn btn-danger btn-sm">
                    <i class="fa fa-trash"></i>
                    Deletar Curso
                </a>
            </div>
        </main>
    </section>
@endsection
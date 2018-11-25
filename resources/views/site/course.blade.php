@extends('site.layout')

@section('site.content')
    <section class="course-details">
        <header class="clearfix">
            @if($course->image)
                <img class="course-details__front-img" src="{{ route('storage.course', ['id' => $course->id]) }}">
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
                </div>
            </div>
        </header>
        <main>
            <h2>Sobre</h2>
            <div class="form-group">{{ $course->description }}</div>
            <h2>Autor</h2>
            @if($course->creator)
                <div class="course-details__teacher clearfix">
                    <img src="{{ route('storage.avatar', ['id' => $course->creator->id]) }}" class="course-details__teacher__img">
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
                        @foreach($course->openClassrooms as $classroom)
                            <tr>
                                <td style="vertical-align: middle;">
                                    {{ $classroom->description }}
                                </td>
                                <td class="text-right" style="width: 100px; vertical-align: middle;">
                                    {{ $classroom->students_count }}/{{ $classroom->max_students }} <i class="fa fa-users"></i>
                                </td>
                                <td class="text-right" style="width: 220px; vertical-align: middle; white-space: nowrap">
                                    {{ $classroom->start_date->format('d/m/Y') }} - {{ $classroom->end_date->format('d/m/Y') }} <i class="fa fa-calendar"></i>
                                </td>
                                <td style="vertical-align: middle; width: 60px">
                                    @if(!$classroom->myRegistrations->last())
                                        <form method="POST" action="{{ route('site.classroom-register') }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $classroom->id }}">
                                            <button class="btn btn-sm btn-primary">
                                                Matricular-se
                                            </button>
                                        </form>
                                    @elseif(!$classroom->myRegistrations->last()->pivot->approved)
                                        Esperando aprovação
                                    @else
                                        <a href="{{ route('forum.home', ['id' => $classroom->id]) }}" class="btn btn-sm btn-primary">Acessar</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($course->podeSerEditadoPor(Auth::user()))
                <h2>Ações</h2>
                <div>
                    <hr>
                    <a href="/nova-turma/{{ $course->id }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-plus"></i> Criar Nova Turma
                    </a>
                    <a href="{{ route('site.edit-course', ['id' => $course->id]) }}" class="btn btn-warning btn-sm">
                        <i class="fa fa-pencil"></i> Editar Curso
                    </a>
                    <a href="{{ route('site.delete-course', ['id' => $course->id]) }}" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Deletar Curso
                    </a>
                </div>
            @endif
        </main>
    </section>
@endsection
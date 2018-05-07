@extends('site.layout')

@section('site.content')
    <section class="luno-content">
        <div class="row">
            <div class="col-md-2">
                @if($user->avatar)
                    <div id="profilepanel__avatar">
                        <img class="img-fluid" src="{{ Auth::user()->avatar->location }}" alt="Foto de perfil de {{ $user->user_name }}">
                    </div>
                @endif
                <nav id="profilepanel__side-nav">
                    <ul>
                        <li><a href="/editar-perfil">Editar Perfil</a></li>
                        <li><a href="/logout">Sair</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-10">
                <h2 class="profilepanel__title">Perfil</h2>
                <table class="table">
                    <tr>
                        <th>
                            Nome
                        </th>
                        <td>
                            {{ $user->user_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Nascimento
                        </th>
                        <td>
                            {{ $user->birthdate->format('d/m/Y') }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Ocupação
                        </th>
                        <td>
                            {{ $user->job }}
                        </td>
                    </tr>
                </table>
                <h2 class="profilepanel__title">Sobre</h2>
                <div>{{ $user->about }}</div>
                <br>
                <h2 class="profilepanel__title">Turmas</h2>
                @if($user->registrations->count())
                    <table>
                        <tbody>
                            @foreach($user->registrations as $registration)
                                <tr>
                                    <td>
                                        {{ $registration->description }}
                                    </td>
                                    <td>
                                        {{ $registration->course->course_name }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else 
                    Este usuário não está frequentando nenhuma turma no momento.
                @endif
            </div>
        </div>
    </section>
@endsection
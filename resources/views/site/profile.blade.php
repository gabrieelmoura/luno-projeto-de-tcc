@extends('site.layout')

@section('site.content')
    <section class="luno-content">
        <div class="row">
            <div class="col-md-2">
                @if($user->avatar)
                    <div id="profilepanel__avatar">
                        <img class="img-fluid" src="{{ $user->avatar->location }}" alt="Foto de perfil de {{ $user->user_name }}">
                    </div>
                @endif
                @if($user->id == Auth::id())
                    <nav id="profilepanel__side-nav">
                        <ul>
                            <li><a href="/editar-perfil">Editar Perfil</a></li>
                            <li><a href="/logout">Sair</a></li>
                        </ul>
                    </nav>
                @endif
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
                            {{ $user->birthdate_formated_br }}
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
                    <tr>
                        <th>Tópicos</th>
                        <td>
                            {{ $user->topics_count }}
                        </td>
                    </tr>
                    <tr>
                        <th>Posts</th>
                        <td>
                            {{ $user->posts_count }}
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
                                        {{ $registration->description }} -
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
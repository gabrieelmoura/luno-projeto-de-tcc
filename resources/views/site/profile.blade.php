@extends('site.layout')

@section('site.content')
    <section id="profilepanel">
        <div class="row">
            <div class="col-md-2">
                @if($user->avatar)
                    <div id="profilepanel__avatar">
                        <img class="img-fluid" src="{{ Auth::user()->avatar->location }}" alt="Foto de perfil de {{ $user->user_name }}">
                    </div>
                @endif
                <nav id="profilepanel__side-nav">
                    <ul>
                        <li><a href="#">Editar Perfil</a></li>
                        <li><a href="#">Trocar Foto</a></li>
                        <li><a href="#">Sair</a></li>
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
                </table>
                <h2 class="profilepanel__title">Dados Acadêmicos</h2>
                <h2 class="profilepanel__title">Turmas</h2>
            </div>
        </div>
    </section>
@endsection
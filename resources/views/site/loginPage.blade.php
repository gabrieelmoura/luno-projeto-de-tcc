@extends('site.layout')

@section('site.content')
    <section id="loginpanel">
        <div class="row">
            <div class="col-md-6" id="loginpanel__login">
                <h2 class="text-center">Já estou registrado</h2>
                <form action="/auth" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="forms__login__email" class="control-label">E-mail</label>
                        <input id="forms__login__email" name="email" type="text" class="form-control" placeholder="E-mail" value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label for="forms__login__password" class="control-label">Senha</label>
                        <input id="forms__login__password" name="user_password" type="password" class="form-control" placeholder="Senha">
                    </div>
                    <div>
                        {{ request()->error }}
                    </div>
                    <div class="form-group">
                        <input type="checkbox">
                        <label for="" class="control-label">
                            Permanecer Conectado
                        </label>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6" id="loginpanel__register">
                <h2 class="text-center">Cadastre-se!</h2>
                <form action="">
                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input type="text" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="">Senha</label>
                        <input type="text" class="form-control" placeholder="Senha">
                    </div>
                    <div class="form-group">
                        <label for="">Confirmação de Senha</label>
                        <input type="text" class="form-control" placeholder="Confirmação de Senha">
                    </div>
                    <div class="form-group">
                        <label for="">Data de Nascimento</label>
                        <input type="text" class="form-control" placeholder="Data de Nascimento">
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Cadastre-se</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @if($errors->any())
        @component('components.dialog')
            @slot('title')
                Alerta
            @endslot
            @foreach($errors->all() as $error)
                <div class="text-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endcomponent
    @endif
@endsection

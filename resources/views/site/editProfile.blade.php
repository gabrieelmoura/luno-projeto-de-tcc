@extends('site.layout')

@section('site.content')
    <div class="luno-top-banner luno-top-banner-new-classroom">
        <div class="luno-top-banner__content"></div>
    </div>
    <div class="luno-content">
        <h1 class="luno-title">Editar Perfil</h1>
        <form method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">
                    Avatar
                </label><br>
                <input type="file" name="avatar">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Nome*
                </label>
                <input type="text" name="user_name" class="form-control" value="{{ old('user_name', $user->user_name) }}">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Data de Nascimento*
                </label>
                <input type="date" name="birthdate" class="form-control" value="{{ old('birthdate', $user->birthdate_formated) }}">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Ocupação
                </label>
                <input type="text" name="job" class="form-control" value="{{ old('job', $user->job) }}">
            </div>
            <div class="form-group">
                <label class="control-label">
                    Sobre Mim
                </label>
                <textarea class="form-control" rows="10" name="about">{{ old('about', $user->about) }}</textarea>
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary">
                    Atualizar
                </button>
            </div>
        </form>
    </div>
@endsection
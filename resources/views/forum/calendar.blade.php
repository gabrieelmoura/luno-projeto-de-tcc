@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Calendário
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            <table class="table">
                <tbody>
                    @forelse($classroom->calendar as $calendar)
                        <tr>
                            <td style="white-space: nowrap; padding-left: 0">
                                <b>{{ $calendar->event_date->format('d/m/Y') }}</b>
                            </td>
                            <td style="width: 99%; padding-right: 0">
                                {{ $calendar->content }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="padding-right: 0; padding-left: 0">
                                O calendário da turma está vazio
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <h2 class="forum__subtitle">Novo Item</h2>
        <form method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Data</label>
                <input type="date" name="event_date" class="form-control">
            </div>
            <div class="form-group">
                <label>Descrição</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
            <button class="btn btn-primary">Enviar</button>
        </form>
    </div>
@endsection
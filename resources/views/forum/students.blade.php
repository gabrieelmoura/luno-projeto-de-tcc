@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>Membros da Turma</h1>
        <h3 class="forum__course-name">
            {{ $classroom->subtitle }}
        </h3>
        <table class="table">
            <thead>
                <tr>
                    <th style="padding-left: 0">
                        Nome
                    </th>
                    <th class="text-right">Função</th>
                    <th class="text-right" style="white-space: nowrap; padding-right: 0">
                        Data de Entrada
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($classroom->registrations as $registration)
                    <tr>
                        <td style="padding-left: 0; width: 99%">
                            <a href="{{ route('site.user', ['id' => $registration->id]) }}">{{ $registration->user_name }}</a>
                        </td>
                        <td class="text-right" style="white-space: nowrap;">
                            @if($registration->pivot->role == 'student')
                                Aluno
                            @elseif($registration->pivot->role == 'teacher')
                                Professor
                            @else
                                --
                            @endif
                        </td>
                        <td class="text-right" style="padding-right: 0; white-space: nowrap;">
                            {{ $registration->pivot->created_at->format('d/m/Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Aprovar Matrículas
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <table class="table">
            <tbody>
                @forelse($classroom->registrations as $pending)
                    <tr>
                        <td style="padding-left: 0; width: 99%">
                            <a href="{{ route('site.user', ['id' => $pending->id]) }}">{{ $pending->user_name }}</a>
                        </td>
                        <td style="white-space: nowrap;">
                            {{ $pending->pivot->created_at->format('d/m/Y h:i') }}
                        </td>
                        <td>
                            <form method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="approve" value="1">
                                <input type="hidden" name="user_id" value="{{ $pending->id }}">
                                <button class="btn btn-success btn-sm">
                                    <i class="fa fa-check"></i> Aprovar
                                </button>
                            </form>
                        </td>
                        <td style="padding-right: 0; padding-left: 0">
                            <form method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" name="approve" value="0">
                                <input type="hidden" name="user_id" value="{{ $pending->id }}">
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-times"></i> Recusar
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td style="padding-left: 0; padding-right: 0">
                            Nenhuma matricula esperando aprovação
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
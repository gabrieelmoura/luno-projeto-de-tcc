@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            {{ $task->title }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div>
            <pre>{{ $task->description }}</pre>
        </div>
        <br>
        <div>
            <table class="table">
                <tbody>
                    <tr>
                        <td style="padding-left: 0; white-space: nowrap;">
                            <b>Peso:</b>
                        </td>
                        <td style="padding-right: 0; width: 99%; text-align: right;">
                            {{ $task->weight }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left: 0; white-space: nowrap;">
                            <b>Prazo:</b>
                        </td>
                        <td style="padding-right: 0; width: 99%; text-align: right;">
                            {{ $task->deadline->format('d/m/Y') }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div>
            <h2>Entregas não avaliadas</h2>
            <table class="table">
                <tbody>
                    @forelse($naoAvaliados as $grade)
                        <tr>
                            <td style="padding-left: 0; white-space: nowrap;">
                                {{ $grade->user->user_name }}
                            </td>
                            <td style="width: 99%">
                                {{ $grade->msg }}
                            </td>
                            <td style="padding-right: 0; white-space: nowrap;">
                                <form method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="grade_id" value="{{ $grade->id }}">
                                    <input required type="text" placeholder="Nota" name="val" class="form-control" value="{{ $grade->val }}" style="display: inline-block; width: 80px; vertical-align: bottom; height: 30px">
                                    <button class="btn btn-primary" style="display: inline-block; margin-left: -4px; height: 30px; padding: 0 5px">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="padding-left: 0; padding-right: 0">
                                Não há entregas não avaliadas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div>
            <h2>Entregas avaliadas</h2>
            <table class="table">
                <tbody>
                    @forelse($avaliados as $grade)
                        <tr>
                            <td style="padding-left: 0; white-space: nowrap;">
                                {{ $grade->user->user_name }}
                            </td>
                            <td style="width: 99%">
                                {{ $grade->msg }}
                            </td>
                            <td style="padding-right: 0; white-space: nowrap;">
                                <form method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="grade_id" value="{{ $grade->id }}">
                                    <input required type="text" placeholder="Nota" name="val" class="form-control" value="{{ $grade->val }}" style="display: inline-block; width: 80px; vertical-align: bottom; height: 30px">
                                    <button class="btn btn-primary" style="display: inline-block; margin-left: -4px; height: 30px; padding: 0 5px">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td style="padding-left: 0; padding-right: 0">
                                Não há entregas avaliadas
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
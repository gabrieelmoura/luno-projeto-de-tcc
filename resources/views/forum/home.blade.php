@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            {{ $classroom->course->course_name }}
        </h1>
        <h3 class="forum__course-name">
            {{ $classroom->description }}
        </h3>
        <div class="luno-title-buttons-holder">
            <h2>Quadro de Avisos</h2>
            <div class="luno-title-buttons">
                <a href="/forum/{{ $classroom->id }}/editar-quadro" class="btn-sm btn-primary btn">
                    <i class="fa fa-pencil"></i> Editar
                </a>
            </div>
        </div>
        <p>
            {{ $classroom->welcome_text }}
        </p>
        <h2>Tarefas Pendentes</h2>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        Atividade 2
                    </td>
                    <td class="text-right">
                        Até 18/02/2018
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-sm btn-primary">Marcar Conclusão</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        Primeira prova online
                    </td>
                    <td class="text-right">
                        Até 18/02/2018
                    </td>
                    <td class="text-right">
                        <a href="#" class="btn btn-sm btn-primary">Marcar Conclusão</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <a href="#" class="btn-sm btn-success btn">
                            <i class="fa fa-plus"></i> Criar Nova Tarefa
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h2>Ultimas Atividades</h2>
        <table class="table">
            <tbody>
            </tbody>
        </table>
        <h2>Fórum</h2>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        <a href="#"><h4>Apresentação</h4></a>
                        Apresentem-se para seus colegas de classe!
                    </td>
                    <td class="text-right">
                        12 posts
                    </td>
                    <td class="text-right">
                        100 mensagens
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#"><h4>Dúvidas</h4></a>
                        Postem suas dúvidas em relação ao material
                    </td>
                    <td class="text-right">
                        12 posts
                    </td>
                    <td class="text-right">
                        100 mensagens
                    </td>
                </tr>
                <tr>
                    <td>
                        <a href="#"><h4>Primeiro Trabalho</h4></a>
                        Siga as instruções do post fixado para a entrega do trabalho
                    </td>
                    <td class="text-right">
                        12 posts
                    </td>
                    <td class="text-right">
                        100 mensagens
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <a href="#" class="btn-sm btn-success btn">
                            <i class="fa fa-plus"></i> Criar Nova Sessão
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>
            Segurança da Informação
        </h1>
        <h2>Quadro de Avisos</h2>
        <p>
            Alunos, por favor não se esqueçam de entregar a atividade 4.<br>
            Não deixem para a ultima hora.
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
            </tbody>
        </table>
        <h2>Ultimas Atividades</h2>
        <table class="table">
            <tbody>
                <tr>
                    <td>
                        Nathália Lemos respondeu no tópico Duvidas
                    </td>
                    <td>
                        10 minutos atrás
                    </td>
                </tr>
                <tr>
                    <td>
                        Nathália Lemos respondeu no tópico Duvidas
                    </td>
                    <td>
                        10 minutos atrás
                    </td>
                </tr>
                <tr>
                    <td>
                        Nathália Lemos respondeu no tópico Duvidas
                    </td>
                    <td>
                        10 minutos atrás
                    </td>
                </tr>
                <tr>
                    <td>
                        Nathália Lemos respondeu no tópico Duvidas
                    </td>
                    <td>
                        10 minutos atrás
                    </td>
                </tr>
                <tr>
                    <td>
                        Nathália Lemos respondeu no tópico Duvidas
                    </td>
                    <td>
                        10 minutos atrás
                    </td>
                </tr>
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
            </tbody>
        </table>
    </div>
@endsection
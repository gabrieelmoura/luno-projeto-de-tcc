@extends('forum.layout')

@section('forum.content')
    <div>
        <h1>Como prevenir SQL Injection na minha aplicação web?</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Sistemas de Informação</a></li>
            <li class="breadcrumb-item"><a href="#">Dúvidas</a></li>
            <li class="breadcrumb-item active">Tópico</li>
        </ol>
        <div class="forum__post clearfix">
            <div class="forum__post__header">
                <span class="forum__post__user-name">
                    Gabriel Moura
                </span>
                <img src="/img/teacher.jpg" class="forum__post__user-photo">
                <table class="forum__post__user-statistics">
                    <tr>
                        <td>Mensagens</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>Tópicos</td>
                        <td>12</td>
                    </tr>
                </table>
            </div>
            <div class="forum__post__content">
                <table class="forum__post__meta">
                    <tr>
                        <td>Como prevenir SQL Injection na minha aplicação web?</td>
                    </tr>
                    <tr>
                        <td>por Gabriel Moura 2h atrás</td>
                    </tr>
                </table>
<pre>
Desenvolvi uma página em PHP para uso interno da empresa que trabalho e apenas pouquíssimas pessoas a utilizam. Através dessa página é possível fazer algumas consultas, inserções, alterações e remoções de dados de uma tabela em um banco de dados MySQL, porém eu acredito que meu código em PHP não está protegido contra injeção de código SQL, por exemplo:

//----CONSULTA SQL----//
$busca = mysql_query ('insert into Produtos (coluna) values(' . $valor . ')');
Logo, digamos que o usuário usar a sentença: 1); DROP TABLE Produtos; para ao campo valor o comando ficaria:

insert into Produtos (coluna) values(1); DROP TABLE Produtos;
Ele vai inserir um novo registro cujo o campo coluna será 1 e logo em seguida ele vai deletar a tabela Produtos.

Como posso melhorar meu código para prevenir essa situação?
</pre>
            </div>
        </div>
        <div class="forum__post forum__post--response clearfix">
            <div class="forum__post__header">
                <span class="forum__post__user-name">
                    Gabriel Moura
                </span>
                <img src="/img/teacher.jpg" class="forum__post__user-photo">
                <table class="forum__post__user-statistics">
                    <tr>
                        <td>Mensagens</td>
                        <td>24</td>
                    </tr>
                    <tr>
                        <td>Tópicos</td>
                        <td>12</td>
                    </tr>
                </table>
            </div>
            <div class="forum__post__content">
                <table class="forum__post__meta">
                    <tr>
                        <td>Re: Como prevenir SQL Injection na minha aplicação web?</td>
                    </tr>
                    <tr>
                        <td>por Gabriel Moura 2h atrás</td>
                    </tr>
                </table>
<pre>
To usando prepared statements agora.
</pre>
            </div>
        </div>
        @for($i=0; $i<10; $i++)
            <div class="forum__post forum__post--response clearfix">
                <div class="forum__post__header">
                    <span class="forum__post__user-name">
                        Usuário
                    </span>
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9b/Antu_im-invisible-user.svg/2000px-Antu_im-invisible-user.svg.png" class="forum__post__user-photo">
                    <table class="forum__post__user-statistics">
                        <tr>
                            <td>Mensagens</td>
                            <td>??</td>
                        </tr>
                        <tr>
                            <td>Tópicos</td>
                            <td>???</td>
                        </tr>
                    </table>
                </div>
                <div class="forum__post__content">
                    <table class="forum__post__meta">
                        <tr>
                            <td>Re: Como prevenir SQL Injection na minha aplicação web?</td>
                        </tr>
                        <tr>
                            <td>por Usuário 2h atrás</td>
                        </tr>
                    </table>
<pre>
span
</pre>
                </div>
            </div>
        @endfor
        <ul class="pagination justify-content-center"">
            <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
        </ul>
    </div>
@endsection
<!DOCTYPE html>
<html>
<head>
    <title>Luno</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/luno.css">
</head>
<body>
    <header>
        <div id="topbar" class="clearfix">
            <span id="topbar__logo">L</span>
            <form id="topbar__form" class="form-inline">
                <input type="text" name="search" class="form-control" placeholder="Pesquise no forum...">
                <button class="btn btn-primary"><span class="fa fa-search"></span></button>
            </form>
            <nav id="topbar__nav">
                <ul>
                    <li><a href="#">Voltar para o Site</a></li>
                    <li><a href="#">Perfil</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="forum" class="clearfix">
        <div id="forum__nav">
            <nav>
                <ul>
                    <li><a href="#">Início</a></li>
                    <li><a href="#">Calendário</a></li>
                    <li><a href="#">Notas</a></li>
                    <li><a href="#">Turma</a></li>
                </ul>
            </nav>
            <div class="forum__nav__label">Fórum</div>
            <nav>
                <ul>
                    <li><a href="#">Apresentação</a></li>
                    <li><a href="#">Dúvidas</a></li>
                    <li><a href="#">Primeiro Trabalho</a></li>
                </ul>
            </nav>
            <div class="forum__nav__label">Material</div>
            <nav>
                <ul>
                    <li><a href="#">Capitulo 1</a></li>
                    <li><a href="#">Capitulo 2</a></li>
                    <li><a href="#">Capitulo 3</a></li>
                    <li><a href="#">Capitulo 4</a></li>
                    <li><a href="#">Capitulo 5</a></li>
                    <li><a href="#">Capitulo 6</a></li>
                    <li><a href="#">Capitulo 7</a></li>
                    <li><a href="#">Capitulo 8</a></li>
                    <li><a href="#">Capitulo 9</a></li>
                    <li><a href="#">Capitulo 10</a></li>
                    <li><a href="#">Capitulo 11</a></li>
                </ul>
            </nav>
        </div>
        <div id="forum__content">
            @yield('forum.content')
        </div>
    </section>
</body>
</html>
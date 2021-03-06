<!DOCTYPE html>
<html>
<head>
    <title>Luno</title>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/luno.css">
</head>
<body>
    <header>
        <div id="topbar" class="clearfix">
            <span id="topbar__logo">L</span>
            <form id="topbar__form" class="form-inline">
                <input type="text" name="search" class="form-control" placeholder="Pesquise cursos...">
                <button class="btn btn-primary"><span class="fa fa-search"></span></button>
            </form>
            <nav id="topbar__nav">
                <ul>
                    @if(!Auth::user())
                        <li><a href="#">Ensine no Luno</a></li>
                        <li><a href="/login">Entrar / Cadastrar</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" id="dropdowns__notificacoes">
                                <span class="fa fa-bell"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowns__notificacoes">
                                <a class="dropdown-item" href="#">Você não tem nenhuma notificação</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="dropdowns__turmas" data-toggle="dropdown">
                                <span class="fa fa-users"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowns__turmas">
                                @forelse(Auth::user()->approvedRegistrations as $registration)
                                    <a class="dropdown-item" href="{{ route('forum.home', ['id' => $registration->id]) }}">
                                        {{ $registration->description }}
                                    </a>
                                @empty
                                    <a class="dropdown-item" href="#">Você não faz parte de nenhuma turma</a>
                                @endforelse
                            </div>
                        </li>
                        <li>
                            <a href="/">
                                Início
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="dropdowns__turmas" data-toggle="dropdown">
                                {{ Auth::user()->user_name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdowns__turmas">
                                <a class="dropdown-item" href="/novo-curso">Criar um curso</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/profile">Ver Perfil</a>
                                <a class="dropdown-item" href="/logout">Sair</a>
                            </div>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>
    @yield('site.content')
    <footer id="mainfooter">
        Nenhum direito reservado &copy; {{ date("Y") }}
    </footer>
    <script src="/js/luno.js"></script>
</body>
</html>
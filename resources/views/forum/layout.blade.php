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
    <div id="luno">
        <header>
            <div id="topbar" class="clearfix">
                <span id="topbar__logo">L</span>
                <form id="topbar__form" class="form-inline">
                    <input type="text" name="search" class="form-control" placeholder="Pesquise no forum...">
                    <button class="btn btn-primary"><span class="fa fa-search"></span></button>
                </form>
                <nav id="topbar__nav">
                    <ul>
                        <li><a href="{{ route('site.home') }}">Voltar para o Site</a></li>
                        <li><a href="{{ route('site.profile') }}">Perfil</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <section id="forum" class="clearfix">
            <div id="forum__nav">
                <nav>
                    <ul>
                        <li><a href="{{ route('forum.home', ['id' => $classroom->id]) }}">Início</a></li>
                        <li><a href="{{ route('forum.calendar', ['id' => $classroom->id]) }}">Calendário</a></li>
                        <li><a href="{{ route('forum.students', ['id' => $classroom->id]) }}">Turma</a></li>
                    </ul>
                </nav>
                <div class="forum__nav__label">Fórum</div>
                <nav>
                    <ul>
                        @forelse($classroom->sections as $section)
                            <li><a href="{{ route('forum.section', ['id' => $classroom->id, 'sid' => $section->id]) }}">{{ $section->title }}</a></li>
                        @empty
                            <li class="forum__nav__off-link">Não há sessões</li>
                        @endforelse
                    </ul>
                </nav>
                @if($classroom->podeSerEditadoPor(Auth::user()))
                    <div class="forum__nav__label">Pedagógico</div>
                    <nav>
                        <ul>
                            <li><a href="{{ route('forum.registrations', ['id' => $classroom->id]) }}">Aprovar Matriculas</a></li>
                            <li><a href="{{ route('forum.new-chapter', ['id' => $classroom->id ]) }}">Postar Material</a></li>
                            <li><a href="{{ route('forum.grades', ['id' => $classroom->id ]) }}">Lançar Notas</a></li>
                        </ul>
                    </nav>
                @endif
                <div class="forum__nav__label">Material</div>
                <nav>
                    <ul>
                        @forelse($classroom->chapters as $chapter)
                            <li><a href="{{ route('forum.chapter', ['id' => $classroom->id, 'cid' => $chapter->id ]) }}">{{ $chapter->title }}</a></li>
                        @empty
                            <li class="forum__nav__off-link">Não há material</li>
                        @endforelse
                    </ul>
                </nav>
                <div class="forum__nav__label">Administrativo</div>
                <nav>
                    <ul>
                        <li><a href="{{ route('forum.edit', ['id' => $classroom->id]) }}">Editar Turma</a></li>
                    </ul>
                </nav>
            </div>
            <div id="forum__content">
                @yield('forum.content')
            </div>
        </section>
    </div>
    <script src="/js/luno.js"></script>
</body>
</html>
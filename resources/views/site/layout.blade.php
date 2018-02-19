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
                <input type="text" name="search" class="form-control" placeholder="Pesquise turmas...">
                <button class="btn btn-primary"><span class="fa fa-search"></span></button>
            </form>
            <nav id="topbar__nav">
                <ul>
                    <li><a href="#">Abra uma Turma</a></li>
                    <li><a href="#">Entre</a></li>
                    <li><a href="#">Cadastre-se</a></li>
                </ul>
            </nav>
        </div>
    </header>
    @yield('site.content')
    <footer id="mainfooter">
        Nenhum direito reservado &copy; {{ date("Y") }}
    </footer>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
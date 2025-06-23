<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar concurso</title>

    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">

<!-- Google font -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

<!-- Themify Icons -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/themify-icons/themify-icons.css') }}">

<!-- IcoFont -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/icofont/css/icofont.css') }}">

<!-- Simple Line Icons -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/icon/simple-line-icons/css/simple-line-icons.css') }}">

<!-- Bootstrap Framework -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">

<!-- Chartlist Chart CSS -->
<link rel="stylesheet" href="{{ asset('assets/plugins/chartist/dist/chartist.css') }}" type="text/css" media="all">

<!-- Weather CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/svg-weather.css') }}" type="text/css">

<!-- Main CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

<!-- Responsive CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body class="sidebar-mini fixed">
<div class="loader-bg">
    <div class="loader-bar"></div>
</div>

<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header-top hidden-print">
        <a href="{{ url('/') }}" class="logo">
            <img class="img-fluid able-logo" src="{{ asset('img/ins ugd.jpg') }}" alt="Logo">
        </a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle"></a>
            <ul class="top-nav lft-nav">
                <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                    <a href="#" id="morphsearch-search" class="drop icon-circle txt-white">
                        <i class="ti-search"></i>
                    </a>
                </li>
            </ul>

            <!-- Navbar Right Menu-->
            <ul class="top-nav">
                <!-- Fullscreen Toggle -->
                <li class="pc-rheader-submenu">
                    <a href="#" class="drop icon-circle" onclick="toggleFullScreen()">
                        <i class="icon-size-fullscreen"></i>
                    </a>
                </li>

                <!-- User Menu-->
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle drop icon-circle drop-image">
                        <span>
                            <img class="img-circle" src="{{ asset('assets/images/avatar-1.png') }}" style="width:40px;" alt="User Image">
                        </span>
                        <span>{{ Auth::user()->name }} <i class="icofont icofont-simple-down"></i></span>
                    </a>
                    <ul class="dropdown-menu settings-menu">
                        <li>
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="icon-logout"></i> Log Out
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Search -->
            <div id="morphsearch" class="morphsearch">
                <form class="morphsearch-form">
                    <input class="morphsearch-input" type="search" placeholder="Search..." />
                    <button class="morphsearch-submit" type="submit">Search</button>
                </form>
                <div class="morphsearch-content">
                    <div class="dummy-column">
                        <h2>People</h2>
                        <a class="dummy-media-object" href="#">
                            <img class="round" src="http://0.gravatar.com/avatar/81b58502541f9445253f30497e53c280?s=50&d=identicon&r=G" alt="Sara Soueidan" />
                            <h3>Sara Soueidan</h3>
                        </a>
                        <a class="dummy-media-object" href="#">
                            <img class="round" src="http://1.gravatar.com/avatar/9bc7250110c667cd35c0826059b81b75?s=50&d=identicon&r=G" alt="Shaun Dona" />
                            <h3>Shaun Dona</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Popular</h2>
                        <a class="dummy-media-object" href="#">
                            <img src="{{ asset('assets/images/avatar-1.png') }}" alt="Page Preloading Effect" />
                            <h3>Page Preloading Effect</h3>
                        </a>
                        <a class="dummy-media-object" href="#">
                            <img src="{{ asset('assets/images/avatar-1.png') }}" alt="DraggableDualViewSlideshow" />
                            <h3>Draggable Dual-View Slideshow</h3>
                        </a>
                    </div>
                    <div class="dummy-column">
                        <h2>Recent</h2>
                        <a class="dummy-media-object" href="#">
                            <img src="{{ asset('assets/images/avatar-1.png') }}" alt="TooltipStylesInspiration" />
                            <h3>Tooltip Styles Inspiration</h3>
                        </a>
                        <a class="dummy-media-object" href="#">
                            <img src="{{ asset('assets/images/avatar-1.png') }}" alt="NotificationStyles" />
                            <h3>Notification Styles Inspiration</h3>
                        </a>
                    </div>
                </div>
                <span class="morphsearch-close"><i class="icofont icofont-search-alt-1"></i></span>
            </div>
            <!-- search end -->
        </nav>
    </header>

    <!-- Side-Nav -->
    <aside class="main-sidebar hidden-print">
        <section class="sidebar" id="sidebar-scroll">
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="nav-level">--- Navigation</li>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="{{ url('dashboard') }}">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>
                </li>

                <li class="treeview">
                    <a class="waves-effect waves-dark" href="{{ url('dashboard') }}">
                        <i class="icon-speedometer"></i><span>Criar concurso</span>
                    </a>
                </li>
                
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="#">
                        <i class="icon-briefcase"></i><span>Configurações</span>
                        <i class="icon-arrow-down"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="{{ url('accordion') }}">
                            <i class="icon-arrow-right"></i> Accordion
                        </a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <!-- Sidebar chat start -->
    <div id="sidebar" class="p-fixed header-users showChat">
        <div class="had-container">
            <div class="card card_main header-users-main">
                <div class="card-content user-box">
                    <div class="md-group-add-on p-20">
                        <span class="md-add-on">
                            <i class="icofont icofont-search-alt-2 chat-search"></i>
                        </span>
                        <div class="md-input-wrapper">
                            <input type="text" class="md-form-control" name="username" id="search-friends">
                            <label>Search</label>
                        </div>
                    </div>
                    <div class="media friendlist-main">
                        <h6>Friend List</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5 class="card-header-text">Criar Concurso</h5>
    </div>
    <div class="card-block">
        <form action="{{ route('concursos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nomeConcurso" class="form-control-label">Nome do Concurso</label>
                <input type="text" class="form-control" id="nomeConcurso" name="nome" placeholder="Insira o nome do concurso">
            </div>
            <div class="form-group">
                <label for="localConcurso" class="form-control-label">Local</label>
                <input type="text" class="form-control" id="localConcurso" name="local" placeholder="Insira o local do concurso">
            </div>
            <div class="form-group">
                <label for="dataConcurso" class="form-control-label">Data</label>
                <input type="date" class="form-control" id="dataConcurso" name="data">
            </div>
            <div class="form-group">
                <label for="competencias" class="form-control-label">Competências</label>
                <select multiple class="form-control multiple-select" id="competencias" name="competencias[]">
                    @foreach($competencias as $competencia)
                        <option value="{{ $competencia->id }}">{{ $competencia->nome }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-30">Criar Concurso</button>
        </form>
    </div>
</div>




<script src="{{ asset('assets/plugins/Jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tether/dist/js/tether.min.js') }}"></script>

<!-- Bootstrap Framework -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Scrollbar JS -->
<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>

<!-- Classic JS -->
<script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>

<!-- Notification -->
<script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>

<!-- Sparkline Charts -->
<script src="{{ asset('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>

<!-- Counter JS -->
<script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/countdown/js/jquery.counterup.js') }}"></script>

<!-- Echart JS -->
<script src="{{ asset('assets/plugins/charts/echarts/js/echarts-all.js') }}"></script>
</body>
</html>
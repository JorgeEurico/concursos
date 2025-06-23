<!DOCTYPE html>
<html lang="en">

<head>
   <title>Dashboard</title>
   <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
     <![endif]-->

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
   <!-- Favicon icon -->
   <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
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
<style>
    .content-wrapper {
    min-height: 100vh;
}

</style>

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
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="{{ url('/') }}">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" data-toggle="modal" data-target="#createConcursoModal" href="{{ route('concursos.criarConcurso') }}">
                        <i class="icon-plus"></i><span>Criar concurso</span>
                    </a>
                </li>
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="">
                        <i class="icon-briefcase"></i><span>Projecto</span>
                        <i class="icon-arrow-down"></i>
                    </a>
                    <ul class=" treeview-menu">
                   <li><a class="active treeview" href="{{ route('projectos.create') }}">
                            <i class="icon-arrow-right"></i> Cadastrar projecto
                        </a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="{{route('projectos.store')}}">
                            <i class="icon-arrow-right"></i> Todos projectos
                        </a></li>
                    </ul>
                </li>
          

                <li class="treeview">
                    <a class="waves-effect waves-dark" href="#">
                        <i class="icon-briefcase"></i><span>Configurações</span>
                        <i class="icon-arrow-down"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="{{ route('configuracoes') }}">
                            <i class="icon-arrow-right"></i> Configurações de Usuário
                        </a></li>
                    </ul>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="{{ route('configuracoes.membro') }}">
                            <i class="icon-arrow-right"></i> Configurações dos membros
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
<div class="content-wrapper">
    
    <!-- Container-fluid starts -->
    <!-- Main content starts -->
    <div class="container-fluid">

    <div class="wrapper">
        <div class="loader-bg">
            <div class="loader-bar"></div>
        </div>

        <div class="wrapper">
            <div class="loader-bg">
                <div class="loader-bar"></div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Cadastrar Projeto</h5>
                        </div>
                        <div class="card-block">
                            <form action="{{ route('projectos.store') }}" method="POST">
                                @csrf
                                <!-- Campo Nome do Projeto -->
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome do Projeto</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>

                                <!-- Campo Descrição do Projeto -->
                                <div class="mb-3">
                                    <label for="descricao" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="descricao" name="descricao" rows="4" required></textarea>
                                </div>

                                <!-- Campo Data de Início -->
                                

                                <!-- Botão para Cadastrar -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Cadastrar Projeto</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    <script src="{{ asset('assets/plugins/Jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tether/dist/js/tether.min.js') }}"></script>

<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>


<script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery.nicescroll/jquery.nicescroll.min.js') }}"></script>


<script src="{{ asset('assets/plugins/classie/classie.js') }}"></script>


<script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>


<script src="{{ asset('assets/plugins/jquery-sparkline/dist/jquery.sparkline.js') }}"></script>


<script src="{{ asset('assets/plugins/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/plugins/countdown/js/jquery.counterup.js') }}"></script>


<script src="{{ asset('assets/plugins/charts/echarts/js/echarts-all.js') }}"></script>


<script type="text/javascript" src="{{ asset('assets/js/main.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/dashboard.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/pages/elements.js') }}"></script>
<script src="{{ asset('assets/js/menu.min.js') }}"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Editar Membro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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


<style>
    html, body {
    height: 100%;
}

</style>


    <!-- Favicon -->
   
</head>

<body class="sidebar-mini fixed">
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
                    <a class="waves-effect waves-dark" href="{{ route('admin.home') }}">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>
                </li>
                <li class="treeview active treeview">
                    <a class="waves-effect waves-dark" href="#">
                        <i class="icon-briefcase"></i><span>Configurações</span>
                        <i class="icon-arrow-down"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="{{ route('configuracoes') }}">
                            <i class="icon-arrow-right"></i> Configurações dos usuarios
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

    <div class="content-wrapper">
    <!-- Container-fluid starts -->
    <div class="container-fluid">
        <div class="wrapper">
            <div class="loader-bg">
                <div class="loader-bar"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Editar Membro do Júri</h5>
                    </div>
                    <div class="card-body" style="padding: 2rem;"> <!-- Aumenta o padding interno -->
                        <form id="editForm" method="POST" action="{{ route('membros-juris.update', $membro->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-3"> <!-- Adiciona margem inferior -->
                                <label for="nome" class="col-md-2 col-form-label form-control-label">Nome</label>
                                <div class="col-md-10">
                                    <input type="text" id="nome" class="form-control" name="nome" value="{{ $membro->nome }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3"> <!-- Adiciona margem inferior -->
                                <label for="patrimonio" class="col-md-2 col-form-label form-control-label">Patrimônio</label>
                                <div class="col-md-10">
                                    <select id="patrimonio" class="form-control" name="patrimonio" required>
                                        <option value="1" {{ $membro->patrimonio ? 'selected' : '' }}>Sim</option>
                                        <option value="0" {{ !$membro->patrimonio ? 'selected' : '' }}>Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3"> <!-- Adiciona margem inferior -->
                                <label for="email" class="col-md-2 col-form-label form-control-label">Email</label>
                                <div class="col-md-10">
                                    <input type="email" id="email" class="form-control" name="email" value="{{ $membro->email }}" required>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
    <label for="competencias" class="col-md-2 col-form-label form-control-label">Competências</label>
    <div class="col-md-10">
    <select class="form-select" name="competencias[]" multiple required style="width: 100%;">
    @foreach($competencias as $competencia)
        <option value="{{ $competencia->id }}" 
            {{ in_array($competencia->id, $membro->competencias->pluck('id')->toArray()) ? 'selected' : '' }}>
            {{ $competencia->descricao }}
        </option>
    @endforeach
</select>

    </div>
</div>

                            <div class="mb-3">
                                <label for="projecto" class="form-label">Projeto</label>
                                <select class="form-control" id="projecto" name="projecto_id">
                                    <option value="">Selecione um projeto</option>
                                    <option value="">Nenhum projeto</option>
                                    @foreach($projectos as $projecto)
                                        <option value="{{ $projecto->id }}">{{ $projecto->nome }}</option>
                                    @endforeach
                                </select>
                             </div>

                             <div class="mb-3">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo" class="form-control" id="tipo">
                        <option value="UGEAMember">Membro da UGEA</option>
                        <option value="Substituto">Substituto</option>
                        <!-- Adicione mais tipos conforme necessário -->
                    </select>
                </div>
                           


                            <div class="form-group row">
                                <div class="col-md-10 offset-md-2">
                                    <button type="submit" class="btn btn-primary" style="background-color: #008B8B; border:none;">
                                        <i class="bi bi-floppy"></i> Salvar
                                    </button>
                                    <a href="{{ route('configuracoes.membro') }}" class="btn btn-secondary">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#inputGroupSelect02').select2({
            placeholder: "Selecione as competências",
            allowClear: true,
            width: 'resolve' // Pode usar '100%' ou 'resolve' para ajustar a largura dinamicamente
        });
    });

</script>






<script src="{{ asset('assets/plugins/Jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/pages/elements.js') }}"></script>
    <script src="{{ asset('assets/js/menu.min.js') }}"></script>


</body>
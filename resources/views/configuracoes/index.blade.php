<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Configurações</title>
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

.content-wrapper {
    min-height: 100vh;
}


    </style>
   
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
                <li class=" active treeview">
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
</div>

<div class="content-wrapper">
        <div class="container-fluid">
<main>
    @yield('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Card de Configurações de Usuários -->
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6 class="mb-0">Configurações de Usuários</h6>
                    </div>
                    <div class="card-body">
                        <!-- Mensagem de Sucesso -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        <!-- Tabela de Usuários -->
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->is_admin ? 'Admin' : 'Usuário' }}</td>
                                            <td>
                                                <!-- Link para Alterar Role -->
                                                <a href="{{ route('configuracoes.editarRole', $usuario->id) }}" class="btn btn-primary" 
                                                   data-bs-toggle="modal" 
                                                   data-bs-target="#modalAlterarRole" 
                                                   data-userid="{{ $usuario->id }}" 
                                                   data-username="{{ $usuario->name }}" 
                                                   data-userrole="{{ $usuario->is_admin ? 'Admin' : 'Usuário' }}"  
                                                   style="background-color: #008B8B; border:none;">
                                                    <i class="bi bi-arrow-clockwise"></i> Alterar Role
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
</div>

<!-- Modal Alterar Role -->



<script src="{{ asset('assets/plugins/Jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/plugins/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/plugins/notification/js/bootstrap-growl.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.min.js') }}"></script>
<script src="{{ asset('assets/js/menu.min.js') }}"></script>
        



</body>
</html>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detalhes</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
<body class="content-wrapper">
    


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
                <li class="active treeview">
                    <a class="waves-effect waves-dark" href="#">
                        <i class="icon-speedometer"></i><span>Detalhes</span>
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

            <!-- Navbar End -->
            <main>
    @yield('content')
    <br>
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <!-- Detalhes do Concurso -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Detalhes do Concurso</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Descrição</th>
                                            <th>Local</th>
                                            <th>Data</th>
                                            <th>Competência Requerida</th>
                                            <th>Projecto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{ $concurso->nome }}</td>
                                            <td>{{ $concurso->descricao }}</td>
                                            <td>{{ $concurso->local }}</td>
                                            <td>{{ $concurso->data }}</td>
                                            <td>
                                                @if($concurso->competencias->isNotEmpty())
                                                    {{ $concurso->competencias->first()->descricao }}
                                                @else
                                                    Não especificada
                                                @endif
                                            </td>
                                            <td>{{ $concurso->projecto ? $concurso->projecto->nome : 'N/A' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jurados -->
              
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-header-text">Jurados</h5>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-12 table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Projeto</th>
                                <th>Funções</th>
                                <th>Acções</th> <!-- Adicionando coluna para as funções -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td id="ugeaMemberNameCell">Membro da UGEA</td>
                                <td></td>
                                <td></td>
                                <td>
                                <a href="#" class="btn btn-primary" onclick="openAddMembroUgeaModal()">Adicionar Membro da UGEA</a>

                                </td>
                            </tr>
                            @forelse($concurso->jurados as $juri)
                            <tr>
                                <td>{{ $juri->nome }}</td>
                                <td>{{ $juri->projecto->nome ?? 'N/A' }}</td>
                                <td>{{ $juri->pivot->funcao }}</td> <!-- Exibe a função do jurado -->
                                <td>
                                    <!-- Botão para abrir a modal de edição da função -->
                                     
                                    <button class="btn btn-warning" onclick="openUpdateModal({{ $juri->id }}, '{{ $juri->pivot->funcao }}')">Alterar Função</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Nenhum jurado selecionado.</td>
                            </tr>
                        @endforelse
                           
                           
                        </tbody>
                    </table>
                </div>
            </div>

            

    </div>
</div>
            <!--<div class="row mt-3">
                <div class="col-sm-12">
                  
                </div>
            </div>
        </div>
    </div>
</form>!-->

<!-- Comissão de Recepção -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-header-text">Comissão de Recepção</h5>
    </div>
    <div class="card-block">
        <div class="row">
            <div class="col-sm-12 table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Projeto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($concurso->comissaoRecepcao as $index => $comissao) <!-- Adicionando índice -->
                            <tr>
                                <td>{{ $comissao->nome }}</td>
                                <td>{{ $comissao->projecto->nome ?? 'N/A' }}</td> <!-- Exibindo nome do projeto -->
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Nenhuma comissão de recepção selecionada.</td> <!-- Atualizando a coluna colspan -->
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


                <!-- Ações -->
                <div class="d-flex align-items-center mt-4">
                    <a href="{{ route('admin.home') }}" class="btn btn-primary" style="background-color: #008B8B; border:none;">Voltar</a>
                    <form action="{{ route('concursos.notificar') }}" method="POST" style="display: inline;">
                        @csrf
                        <input type="hidden" name="concurso_id" value="{{ $concurso->id }}">
                        <button type="submit" class="btn btn-danger ml-3"  data-toggle="modal" data-target="#notificacaoModal">Notificar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notificacaoModal" tabindex="-1" role="dialog" aria-labelledby="notificacaoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="notificacaoModalLabel">Notificação Enviada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Todos os membros do júri e da comissão de recepção foram notificados com sucesso.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal para Atualizar Função e Adicionar Membro da UGEA -->
<div class="modal fade" id="updateJuradoModal" tabindex="-1" role="dialog" aria-labelledby="updateJuradoModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateJuradoModalLabel">Atualizar Função do Jurado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('concursos.updateJurados', $concurso->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="jurado_id" name="jurado_id">
                    <div class="form-group">
                        <label for="funcao">Função</label>
                        <select id="funcao" name="funcao" class="form-control">
                            <option value="Presidente">Presidente</option>
                            <option value="Vogal">Vogal</option>
                            <option value="Relator">Relator</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="addMembroUgeaModal" tabindex="-1" aria-labelledby="addMembroUgeaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addMembroUgeaForm" action="{{ route('concursos.addMembroUgea', $concurso->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title" id="addMembroUgeaModalLabel">Adicionar Membro da UGEA</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="membroUgeaId" class="form-label">Selecionar Membro da UGEA</label>
                        <select name="membro_ugea_id" id="membroUgeaId" class="form-select" required>
                            <option value="" selected disabled>Selecione um membro</option>
                            @foreach($membrosUgea as $membro)
                                <option value="{{ $membro->id }}">{{ $membro->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#notificationForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{ route('concursos.notificar') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    $('#notificacaoModal').modal('show');
                },
                error: function(xhr) {
                    alert('An error occurred. Please try again.');
                }
            });
        });
    });


    function openUpdateModal(juradoId = null, funcao = '') {
        // Se um jurado específico for passado, preenche os dados do jurado
        if (juradoId) {
            $('#jurado_id').val(juradoId);
            $('#funcao').val(funcao);
        } else {
            // Limpar os campos se não for um jurado específico
            $('#jurado_id').val('');
            $('#funcao').val('');
        }

        // Abrir a modal
        $('#updateJuradoModal').modal('show');
    }

    function openAddMembroUgeaModal() {
        // Usando jQuery para abrir a modal
        $('#addMembroUgeaModal').modal('show');
    }


</script>
</main>






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
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/pages/dashboard.js') }}"></script>
    <script src="{{ asset('assets/pages/elements.js') }}"></script>
    <script src="{{ asset('assets/js/menu.min.js') }}"></script>
      
           

</body>
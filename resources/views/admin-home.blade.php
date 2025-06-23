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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<style>
    html, body {
    height: 100%;
}

</style>


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
                    <a class="waves-effect waves-dark" href="{{ url('/') }}">
                        <i class="icon-speedometer"></i><span> Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                <a class="waves-effect waves-dark" data-toggle="modal" data-target="#createConcursoModal" href="{{ route('concursos.create') }}">
        <i class="icon-plus"></i><span>Criar concurso</span>
    </a>
                </li>
                <li class="treeview">
                    <a class="waves-effect waves-dark" href="#">
                        <i class="icon-briefcase"></i><span>Projecto</span>
                        <i class="icon-arrow-down"></i>
                    </a>
                    <ul class="treeview-menu">
                   <li><a class="waves-effect waves-dark" href="{{ route('projectos.create') }}">
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
        <div class="row">
            <div class="main-header">
                <h4>Dashboard</h4>
            </div>
        </div>

        <!-- 4-blocks row start -->
        <div class="row dashboard-header">
    <!-- Estatísticas dos Concursos -->
    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-product">
            <span>Concursos Criados</span>
            <h2 class="dashboard-total-products">{{ $totalConcursos }}</h2>
            <span class="label label-success">Total</span>
            <div class="side-box">
                <i class="ti-signal text-success-color"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-product">
            <span>Concursos A Decorrer</span>
            <h2 class="dashboard-total-products">{{ $concursosAbertos }}</h2>
            <span class="label label-primary">Ativos</span>
            <div class="side-box">
                <i class="ti-direction-alt text-primary-color"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-product">
            <span>Concursos Cancelados</span>
            <h2 class="dashboard-total-products">{{ $concursosCancelados }}</h2>
            <span class="label label-danger">Cancelados</span>
            <div class="side-box">
                <i class="ti-rocket text-danger-color"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card dashboard-product">
            <span>Concursos Terminados</span>
            <h2 class="dashboard-total-products">{{ $concursosTerminados }}</h2>
            <span class="label label-info">Terminados</span>
            <div class="side-box">
                <i class="ti-minus text-info-color"></i>
            </div>
        </div>
    </div>
</div>


        <!-- Tabela de Concursos -->
        <div class="row">
            <div class="col-sm-12">
                <!-- Basic Table starts -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Concursos</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nome</th>
                                            <th>Tipo</th>
                                            <th>Local</th>
                                            <th>Data</th>
                                            <th>Projecto</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($concursos as $concurso)
                                            <tr>
                                                <td>{{ $concurso->id }}</td>
                                                <td>{{ $concurso->nome }}</td>
                                                <td>{{ $concurso->descricao }}</td>
                                                <td>{{ $concurso->local }}</td>
                                                <td>{{ $concurso->data }}</td>
                                                <td>{{ $concurso->projecto ? $concurso->projecto->nome : 'N/A' }}</td>
                                                <td>
                                                    @if($concurso->status == 'aberto')
                                                        <span class="badge bg-success">A decorrer</span>
                                                        @elseif($concurso->status == 'terminado')
                                                            <span class="badge bg-info">terminado</span>
                                                    @else
                                                        <span class="badge bg-danger">Cancelado</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('concursos.show', $concurso->id) }}" class="btn btn-primary btn-sm"data-toggle="tooltip" title="Detalhes">
                                                        <i class="icon-eye"></i>
                                                    </a>

                                                    <form method="POST" action="{{ route('concursos.deletar', $concurso->id) }}" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Eliminar">
                                                                 <i class="icon-trash"></i>
                                                        </button>
                                                    </form>

                                                   <!-- Formulário para alterar o status -->
<form method="POST" action="{{ route('concursos.alterarStatus', $concurso->id) }}" class="d-inline-block">
    @csrf
    <input type="hidden" name="status" value="{{ $concurso->status == 'aberto' ? 'cancelado' : 'aberto' }}">
    <button type="submit" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" 
            title="{{ $concurso->status == 'aberto' ? 'Cancelar' : 'Abrir' }}">
        <i class="{{ $concurso->status == 'aberto' ? 'fas fa-lock' : 'fas fa-lock-open' }}"></i>
    </button>
</form>

<!-- Formulário para finalizar o concurso -->
<form method="POST" action="{{ route('concursos.finalizar', $concurso->id) }}" class="d-inline-block">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" 
            title="Finalizar">
        <i class="fas fa-stop"></i>
    </button>
</form>


                                                   
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br><br>
            </div>
        </div>
    </div>
  

    <!-- Container-fluid ends -->
</div>

<div class="modal fade" id="createConcursoModal" tabindex="-1" role="dialog" aria-labelledby="createConcursoModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createConcursoModalLabel">Criar Concurso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulário de criação de concurso -->
        <form id="formCriarConcurso" method="POST" action="{{ route('concursos.criarConcurso') }}">
          @csrf
          <div class="form-group">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>            
          </div>
          <div class="form-group">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" required></textarea>
          </div>
          <div class="form-group">
            <label for="local" class="form-label">Local</label>
            <input type="text" class="form-control" id="local" name="local" required>
          </div>
          <div class="form-group">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data" name="data" required>
          </div>
          
          <div class="form-group">
            <label for="competencias" class="form-label">Competências</label>
            <select class="form-control" id="competencias" name="competencias[]" required >
              @foreach($competencias as $competencia)
                <option value="{{ $competencia->id }}">{{ $competencia->descricao }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
    <label for="projecto" class="form-label">Projecto</label>
    <select class="form-control" id="projecto" name="projecto" required>
        @foreach($projectos as $projecto)
            <option value="{{ $projecto->id }}">{{ $projecto->nome }}</option>
        @endforeach
    </select>
</div>

          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</div>





<script>
   $(document).ready(function () {
    $('#formCriarConcurso').on('submit', function (e) {
        e.preventDefault(); // Previne o envio normal do formulário

        // Obter o token CSRF diretamente do meta tag gerado pelo Laravel
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: '{{ route('concursos.criarConcurso') }}', // Certifique-se que esta rota está correta
            data: $(this).serialize(), // Serializa os dados do formulário

            // Adicionar o token CSRF ao cabeçalho da requisição
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },

            success: function (response) {
                // Fechar o modal após o sucesso
                $('#createConcursoModal').modal('hide');

                // Exibir uma mensagem de sucesso
                alert('Concurso criado com sucesso!');

                // Recarregar a página para atualizar a lista de concursos
                location.reload(); // Ou atualize dinamicamente a lista de concursos
            },
            error: function (xhr) {
                // Lidar com erros de validação ou outros erros
                if (xhr.status === 422) {
                    // 422 Unprocessable Entity significa erro de validação no Laravel
                    let errors = xhr.responseJSON.errors;
                    let errorMessage = '';

                    // Itera sobre os erros e monta uma mensagem de erro
                    $.each(errors, function (key, value) {
                        errorMessage += value[0] + '\n';
                    });

                    // Exibe as mensagens de erro ao usuário
                    alert('Erro ao criar concurso: \n' + errorMessage);
                } else {
                    alert('Erro ao criar concurso. Verifique os dados e tente novamente.');
                }
            }
        });
    });
});

$(document).ready(function() {
        $('#createConcursoModal').on('show.bs.modal', function() {
            $.ajax({
                url: '{{ route("projectos.carregar") }}',
                method: 'GET',
                success: function(data) {
                    var select = $('#projecto');
                    select.empty(); // Limpa as opções existentes

                    // Adiciona os projetos recebidos na resposta
                    $.each(data, function(index, projecto) {
                        select.append($('<option></option>').attr('value', projecto.id).text(projecto.nome));
                    });
                }
            });
        });
    });





</script>

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


  
</body>

</html>
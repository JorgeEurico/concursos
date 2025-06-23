<!DOCTYPE html>
<html>
<head>


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


    <title>Notificação de Seleção</title>
</head>
<body>
<h1>Olá, {{ $membroNome }}</h1>
    <p>Você foi selecionado para participar do concurso "{{ $concursoNome }}" como {{ $tipo == 'juri' ? 'membro do júri' : 'membro da comissão de recepção' }}.</p>
    <p>Data do Concurso: {{ $dataConcurso }}</p>
    <p>Por favor, prepare-se adequadamente para o evento.</p>
    <p>Atenciosamente,</p>
    <p>A Organização do Concurso</p>

    <!-- Modais -->





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
</html>

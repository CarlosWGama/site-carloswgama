<!DOCTYPE html>
<html>
<head>
    <!-- ==========================
    	Meta Tags 
    =========================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ==========================
    	Title 
    =========================== -->
    <title>Carlos W. Gama</title>

    <!-- ==========================
    	Favicons 
    =========================== -->
    <link rel="shortcut icon"  type="image/x-icon" href="{{URL::to('/favicon.ico')}}">
	
    <!-- ==========================
    	Fonts 
    =========================== -->
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lilita+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  

    <!-- ==========================
    	CSS 
    =========================== -->
    <link href="{{URL::to('/site/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/creative-brands.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/vertical-carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/custom.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/cwg.css')}}" rel="stylesheet" type="text/css">

    <!-- ==========================
    	Fonts 
    =========================== -->
    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lilita+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Alegreya+Sans+SC' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  
    @stack('css')
    
    <!-- ==========================
    	JS 
    =========================== -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
</head>
<body id="page-top">
	@yield('header')
	@yield('sobre')
	@yield('portfolio')
	@yield('trabalhos_anteriores')
	@yield('testemunhos')
	@yield('contatos')
    @yield('conteudo_principal')
	@yield('footer')
    
    <!-- ==========================
    	JS 
    =========================== -->
	<script src="https://code.jquery.com/jquery-latest.min.js"></script>
	<script src="{{URL::to('/site/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('/site/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::to('/site/js/creative-brands.js')}}"></script>
    <script src="{{URL::to('/site/js/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{URL::to('/site/js/modernizr.custom.js')}}"></script>
    <script src="{{URL::to('/site/js/waypoints.min.js')}}"></script>
    <script src="{{URL::to('/site/js/jquery.countTo.js')}}"></script>
    <script src="{{URL::to('/site/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{URL::to('/site/js/custom.js')}}"></script>

    @stack('scripts')
</body>
</html>
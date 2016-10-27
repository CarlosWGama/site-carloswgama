<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Carlos W. Gama</title>

    <!-- Bootstrap core CSS -->

    <link href="{{url('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('admin/css/cwg.css')}}" rel="stylesheet">

    <link href="{{url('admin/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('admin/css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{url('admin/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('admin/css/maps/jquery-jvectormap-2.0.3.css')}}" />
    <link href="{{url('admin/css/icheck/flat/green.css')}}" rel="stylesheet" />
    <link href="{{url('admin/css/floatexamples.css')}}" rel="stylesheet" type="text/css" />

    <script src="{{url('admin/js/jquery.min.js')}}"></script>

@if (isset($JS['alert']) && $JS['alert'])
    <link href="{{url('admin/css/alert/jquery-confirm.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{url('admin/js/alert/jquery-confirm.js')}}"></script>
@endif
</head>


<body class="nav-md">

    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{route('admin.dashboard')}}" class="site_title">
                        <img class="icon-cwg-sidebar" src="{{url('site/image/CWG.png')}}"/> 
                        <span>CWG</span>
                    </a>
                </div>
          
                <div class="clearfix"></div>

                <br />

                <!-- SIDEBAR -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <ul class="nav side-menu">
                            <!-- DASHBOARD-->
                            <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
                            
                            <!-- USUARIOS -->
                            <li>
                                <a><i class="fa fa-users"></i> Usuários <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{route('admin.usuarios.novo')}}">Novo</a></li>
                                    <li><a href="{{route('admin.usuarios.listar')}}">Listar</a></li>
                                </ul>
                            </li>

                            <!-- Header -->
                            <li>
                                <a><i class="fa fa-facebook"></i> Header <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{route('admin.header.social.novo')}}">Nova Rede Social</a></li>
                                    <li><a href="{{route('admin.header.social.listar')}}">Listar Redes Sociais</a></li>
                                    <li><a href="{{route('admin.header.slides.novo')}}">Novo Slide</a></li>
                                    <li><a href="{{route('admin.header.slides.listar')}}">Listar Slides</a></li>
                                </ul>
                            </li>

                            <!-- Biográfia -->
                            <li>
                                <a><i class="fa fa-user"></i> Biográfia <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{route('admin.biografia.editar')}}">Editar Biográfia</a></li>
                                    <li><a href="{{route('admin.biografia.anos.novo')}}">Novo - Ano</a></li>
                                    <li><a href="{{route('admin.biografia.anos.listar')}}">Listar - Anos</a></li>
                                    <li><a href="{{route('admin.biografia.habilidades.nova')}}">Nova - Habilidade</a></li>
                                    <li><a href="{{route('admin.biografia.habilidades.listar')}}">Listar - Habilidades</a></li>
                                </ul>
                            </li>

                            <!-- Portfólio -->
                            <li>
                                <a><i class="fa fa-user"></i> Portfólio <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="{{route('admin.portfolios.novo')}}">Novo</a></li>
                                    <li><a href="{{route('admin.portfolios.listar')}}">Listar</a></li>
                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
                <!-- SIDEBAR[FIM] -->
            </div>
        </div>

      <!-- MENU_TOPO -->
      <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                {{$usuarioLogado->nome}}
                                <span class=" fa fa-angle-down"></span>
                            </a>

                            <!-- MENU -->
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                <li><a href="javascript:;">  Perfil</a></li>
                                <li><a href="{{route('logout')}}" data-method="DELETE" class="restful"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
      </div>
      <!-- MENU_TOPO[FIM] -->


      <div class="right_col" role="main">
        <!-- CONTEUDO PRINCIPAL -->
        @yield('contents')

        <!-- CONTEUDO PRINCIPAL -->

				<!-- FOOTER -->
				<footer>
					<div class="copyright-info">
						<p class="pull-right">{{date('Y')}} - Carlos W. Gama</a>		
						</p>
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- FOOTER[FIM] -->
			</div>
		</div>
	</div>

  <script src="{{url('admin/js/bootstrap.min.js')}}"></script>

  <!-- bootstrap progress js -->
  <script src="{{url('admin/js/progressbar/bootstrap-progressbar.min.js')}}"></script>
  
  <!-- Restful -->
  <script src="{{url('admin/js/restfulizer-js/jquery.restfulizer.js')}}"></script>
  <script type="text/javascript">
			$(document).ready(function() {
				$('.restful').restfulizer({
                    token: "{{csrf_token()}}"
                });
			});
		</script>

  <script src="{{url('admin/js/custom.js')}}"></script>

  @stack('scripts')
  
  <!-- pace -->
  <script src="{{url('admin/js/pace/pace.min.js')}}"></script>
  
  <!-- /footer content -->
</body>

</html>

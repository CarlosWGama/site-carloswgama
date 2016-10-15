<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Carlos W. Gama - Admin</title>

  <!-- Bootstrap core CSS -->

  <link href="{{url('admin/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="{{url('admin/fonts/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{url('admin/css/animate.min.css')}}" rel="stylesheet">

  <!-- Custom styling plus plugins -->
  <link href="{{url('admin/css/custom.css')}}" rel="stylesheet">
  <link href="{{url('admin/css/icheck/flat/green.css')}}" rel="stylesheet">


  <script src="{{url('admin/js/jquery.min.js')}}"></script>

</head>

<body style="background:#F7F7F7;">

	<div id="wrapper">
    	<div id="login" class="animate form">
        	<section class="login_content">
          		
				<form action='{{route('login.logon')}}' method="post">
					{{ csrf_field() }}
					

            		<h1>Login</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (isset($erro_login))
    <div class="alert alert-danger">
		<p>{{ $erro_login }}</p>
    </div>
@endif

            
					<div>
              			<input type="text" class="form-control" name="email" placeholder="E-mail" required="" />
            		</div>
            
					<div>
              			<input type="password" class="form-control" name="senha" placeholder="Senha" required="" />
            		</div>
            
					<div>
              			<button class="btn btn-default submit">Logar</button>
              		</div>
            
					<div class="clearfix"></div>
            		<div class="separator">

             		<div class="clearfix"></div>
              
			  		<br />
              
			  		<div>
                		<h1>Carlos W. Gama</h1>

               			<p>{{ date('Y')}}</p>
              		</div>
					
				</form>
				<!-- form -->
			</section>
			<!-- content -->
		</div>
	</div>

</body>

</html>

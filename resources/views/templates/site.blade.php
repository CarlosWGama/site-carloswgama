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
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lilita+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  

    <!-- ==========================
    	CSS 
    =========================== -->
    <link href="{{URL::to('/site/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/creative-brands.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/vertical-carousel.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::to('/site/css/custom.css')}}" rel="stylesheet" type="text/css">


    <!-- ==========================
    	Fonts 
    =========================== -->
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lilita+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Alegreya+Sans+SC' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  

    
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
	@yield('servicos')
	@yield('numeros')
	@yield('case')
	@yield('comentario')
	@yield('trabalhos_anteriores')
	@yield('blog')
	@yield('precos')
	@yield('testemunhos')
	@yield('contatos')
	@yield('footer')
    
    <!-- ==========================
    	JS 
    =========================== -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="{{URL::to('/site/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('/site/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{URL::to('/site/js/creative-brands.js')}}"></script>
    <script src="{{URL::to('/site/js/jquery.easy-pie-chart.js')}}"></script>
    <script src="{{URL::to('/site/js/modernizr.custom.js')}}"></script>
    <script src="{{URL::to('/site/js/waypoints.min.js')}}"></script>
    <script src="{{URL::to('/site/js/jquery.countTo.js')}}"></script>
    <script src="{{URL::to('/site/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{URL::to('/site/js/custom.js')}}"></script>
    <script>
    $(function () { 
		$("input,textarea").jqBootstrapValidation({
        	preventSubmit: true,
			
			submitSuccess: function($form, event) {
				event.preventDefault(); // prevent default submit behaviour
				// get values from FORM
				var firstname = $("input#firstname").val();
				var lastname = $("input#lastname").val();
				var email = $("input#email").val();
				var message = $("textarea#message").val();
	
				$.ajax({
					url: "send.php",
					type: "POST",
					data: {
						firstname: firstname,
						lastname: lastname,
						email: email,
						message: message
					},
					cache: false,
					success: function() {
						// Success message
						$('.contact-alert').html("<div class='alert alert-success'>");
						$('.contact-alert > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times'></i></button><strong>Your message has been sent.</strong></div>");
						//clear all fields
						$('#contactForm').trigger("reset");
					},
					error: function() {
						// Fail message
						$('.contact-alert').html("<div class='alert alert-danger'>");
						$('.contact-alert > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'><i class='fa fa-times'></i></button><strong>Sorry, it seems that my mail server is not responding. Please try again later!</strong></div>");
						//clear all fields
						$('#contactForm').trigger("reset");
					},
				})
			}
		});
	});
    </script>
</body>
</html>
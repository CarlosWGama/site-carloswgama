@extends('layouts.site')

	
@section('header')
    <a href="#page-top" class="scroll-up scroll"><i class="fa fa-chevron-up"></i></a>
    <h1>Carlos W. Gama</h1>
    <!-- ==========================
    	HEADER - START 
    =========================== -->
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavigation"><i class="fa fa-bars"></i></button>
                    <img src="{{URL::to('site/image/CWG.png')}}" class="navbar-logo pull-left" alt="" />
                    <a href="index.html" class="navbar-brand animated flipInX">Carlos W. Gama</a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="myNavigation">
                
                    <ul class="nav navbar-nav navbar-right animated flipInX">
                        <li><a href="#about" class="scroll">Sobre</a></li>
                        <li><a href="#contact" class="scroll">Contato</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container -->
        </nav>
       
        <div class="jumbotron">
            <img src="{{URL::to('site/image/CWG.png')}}" class="img-responsive scrollpoint sp-effect3" alt="" />	
            <div class="social-wrapper">
                <ul class="brands brands-inline hidden-xs scrollpoint sp-effect1">
                    <!-- Redes Sociais do Lado Esquerdo -->
                    @foreach($redes_sociais as $rede_social)
                        @if (!$rede_social->lado)
                            <li><a href="{{$rede_social->link}}"><i class="fa {{$rede_social->class_icon}}  hi-icon-effect-8"></i></a></li>
                        @endif
                    @endforeach
                </ul>   
                <h2 class="scrollpoint sp-effect3">Carlos W. Gama</h2>
                <ul class="brands brands-inline hidden-xs scrollpoint sp-effect2">
                    @foreach($redes_sociais as $rede_social)
                        @if ($rede_social->lado)
                            <li><a href="{{$rede_social->link}}"><i class="fa {{$rede_social->class_icon}}  hi-icon-effect-8"></i></a></li>
                        @endif
                    @endforeach
                </ul>       
            </div>
            <!-- Slideshow start -->                          
            <div id="slideshow" class="carousel slide vertical scrollpoint sp-effect3" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach($slides as $slide)
                    <!-- Slideshow item 1 active --> 
                    <div class="item  @if ($loop->first) active @endif"><h3>I <i class="fa {{$slide->class_icon}}"></i> {{$slide->descricao}}</h3></div>
                    @endforeach
                </div>
            </div>
            <!-- Slideshow end -->   
        <a href="#about" class="btn btn-reference btn-lg scroll scrollpoint sp-effect1" role="button"><i class="fa fa-smile-o"></i> Conheça-me</a>
        <a href="#contact" class="btn btn-reference btn-lg btn-active scroll scrollpoint sp-effect2" role="button"><i class="fa fa-bolt"></i> Contrate-me</a> 
        </div>
    </header>
    <!-- ==========================
    	HEADER - END 
    =========================== -->
@stop

@section('sobre')
    <!-- ==========================
    	ABOUT - START 
    =========================== -->
    <section id="about" class="content-first">
        <div class="container">
            <div class="row">
                <div class="col-sm-2 hidden-xs scrollpoint sp-effect1"><!-- Profile image --> 
                	<img src="{{url('storage/'.$biografia->avatar)}}" class="image-bordered img-responsive" alt="" />                
                </div><!-- Profile end --> 
                
                <div class="col-md-7 col-sm-6 scrollpoint sp-effect1"><!-- Profile description --> 
                	<h3>{{$biografia->titulo}}</h3>
                  	<p>{{$biografia->descricao}}</p>      
                    
               </div><!-- Profile description end--> 
                
              <div class="col-md-3 col-sm-4 scrollpoint sp-effect2"><!--Timeline-->
                 
                  <div class="timeline">
                    @if(count($biografia->anos) > 0)
                        @foreach($biografia->anos as $ano)
                        <!-- ANO{{$ano->ano}} -->
                        <div class="event">
                            <div class="event-info">
                                <div class="date">{{$ano->ano}}</div>
                            </div>
                      	    <span>{{$ano->descricao}}</span>
                        </div> <!--ANO{{$ano->ano}}[FIM] -->
                        @endforeach
                    @endif
                  </div><!--timeline-->
              </div><!--col 3 end-->
               
            </div><!--Row about end-->
            
            
            <div class="row">
            	<div class="col-md-12 text-center">
                	<a id="skills-toggle" class="btn btn-primary"><i class="fa fa-arrow-circle-o-down"></i> Cheque minhas habilidades</a>
                </div>
            </div>
        </div><!-- Container end-->
        
        <div id="skills">
            <div class="container">   
                <div class="row"><!-- Toogle my skills start --> 
                    @if (count($biografia->habilidades) > 0)
                        @foreach($biografia->habilidades as $habilidade)
                        <div class="col-md-{{intval(12/count($biografia->habilidades))}}">
                            <div class="chart" data-percent="{{$habilidade->porcentagem}}">{{$habilidade->porcentagem}}% {{$habilidade->habilidade}}</div>
                        </div>
                        @endforeach
                    @endif
                </div><!-- Toogle my skills end--> 
                
            </div><!-- Container end-->
        </div>
        
    </section>
    <!-- ==========================
    	ABOUT - END 
    =========================== --> 
@stop

@section('portfolio')
     <!-- ==========================
    	SERVICER - START
    =========================== -->   
    <section id="services" class="content-second">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="scrollpoint sp-effect3">O que eu faço?</h2>
                    <p class="scrollpoint sp-effect3">Conteúdos que costumo trabalhar</p> 
                </div>
                

                @unless(empty($portfolios))    
                    @foreach($portfolios as $portfolio)
                        <div class="col-md-3 service scrollpoint sp-effect1">
                            <img src="{{URL::to('storage/portfolios/' . $portfolio->imagem)}}" class="img-portfolio">
                            <h3>{{$portfolio->titulo}}</h3>
                            <p>{{$portfolio->descricao}}</p>
                        </div>
                    @endforeach
                @endunless
                
            </div>
        </div>
    </section>
    <!-- ==========================
    	SERVICES - END 
    =========================== -->
@stop

@section('numeros')
    <!-- ==========================
    	NUMBERS - START
    =========================== -->   
    <section id="separator" class="content-first">
        <div class="container">
            <div class="row scrollpoint sp-effect3">
                <div class="col-sm-2">
                	<i class="fa fa-user"></i>
                    <p><span class="number highlight" data-from="0" data-to="100" data-refresh-interval="10"></span> Happy clients</p>
                </div> 	
                <div class="col-sm-2">
                	<i class="fa fa-coffee"></i>
                    <p><span class="number highlight" data-from="0" data-to="250" data-refresh-interval="10"></span> cups of coffee</p>
                </div> 	
                <div class="col-sm-2">
                	<i class="fa fa-code"></i>
                    <p><span class="number highlight" data-from="0" data-to="2500" data-refresh-interval="10"></span> lines of codes</p>
                </div> 	
                <div class="col-sm-2">
                	<i class="fa fa-envelope"></i>
                    <p><span class="number highlight" data-from="0" data-to="300" data-refresh-interval="10"></span> emails</p>
                </div> 	
                <div class="col-sm-2">
                	<i class="fa fa-phone"></i>
                    <p><span class="number highlight" data-from="0" data-to="50" data-refresh-interval="10"></span> hours phone calls</p>
                </div> 	
                <div class="col-sm-2">
                	<i class="fa fa-facebook"></i>
                    <p><span class="number highlight" data-from="0" data-to="24" data-refresh-interval="10"></span> hours facebook</p>
                </div> 	
            </div>
        </div>
    </section>
    <!-- ==========================
    	NUMBERS - END 
    =========================== -->
@stop

@section('case')
     <!-- ==========================
    	SHOWCASE - START
    =========================== -->   
    <section id="showcase" class="content-second">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="scrollpoint sp-effect3">Meu último trabalho</h2>
                    <p class="scrollpoint sp-effect3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in turpis quam. Nulla quis eleifend lectus.</p> 
                </div>
                
                <div class="col-lg-6 showcase-text scrollpoint sp-effect1">
                    <div class="row">
                    <!-- Service 1 -->
                    	<div class="col-sm-6 col-md-6 col-lg-12">
                            <div class="media">
                                <div class="pull-left showcase-icon"><i class="fa fa-puzzle-piece"></i></div>
                                <div class="media-body">
                                    <h3 class="media-heading">Browser friendly</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur ad.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Service 2 -->
                    	<div class="col-sm-6 col-md-6 col-lg-12">
                            <div class="media">
                                <div class="pull-left showcase-icon"><i class="fa fa-trophy"></i></div>
                                <div class="media-body">
                                   <h3 class="media-heading">First class design</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur ad.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Service 3 -->
                    	<div class="col-sm-6 col-md-6 col-lg-12">
                            <div class="media">
                                <div class="pull-left showcase-icon"><i class="fa fa-thumbs-up"></i></div>
                                <div class="media-body">
                                    <h3 class="media-heading">Profesional scheme for freelancers</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur ad.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Service 4 -->
                    	<div class="col-sm-6 col-md-6 col-lg-12">
                            <div class="media">
                                <div class="pull-left showcase-icon"><i class="fa fa-arrows"></i></div>
                                <div class="media-body">
                                    <h3 class="media-heading">Fully responsive</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur ad.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                   <div class="text-center showcase-button">
                   		<a class="btn btn-primary btn-lg" role="button"><i class="fa fa-bolt"></i> See in action</a>
                   </div>
                </div>            
            
                <div class="col-lg-6 col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2 col-lg-offset-0 showcase-carousel hidden-xs scrollpoint sp-effect2">
                    <img src="{{URL::to('site/image/imac.png')}}" class="img-responsive" alt="">
                    
                    <div id="carousel-reference" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active"><img src="{{URL::to('site/image/image_01.png')}}" alt=""></div>
                            <div class="item"><img src="{{URL::to('site/image/image_02.png')}}" alt=""></div>
                        </div>
                        
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-reference" data-slide="prev"><i class="fa fa-arrow-left"></i></a>
                        <a class="right carousel-control" href="#carousel-reference" data-slide="next"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>  
            </div>
        </div>
    </section>
    <!-- ==========================
    	SHOWCASE - END 
    =========================== -->
@stop

@section('comentario')
    <!-- ==========================
    	QUOTES - START
    =========================== -->   
    <section id="quotes" class="content-first">
        <div class="container">
            <div class="row scrollpoint sp-effect3">
                <div class="col-sm-8 col-sm-offset-2">
                    <blockquote class="blockquote-reverse">
                        <p><i class="fa fa-quote-left"></i> Design is not just what it looks like and feels like. Design is how it works.</p>
                        <footer> Steve Jobs</footer>
                    </blockquote>
                </div>   	
            </div>
        </div>
    </section>
    <!-- ==========================
    	QUOTES - END 
    =========================== -->
@stop

@section('trabalhos_anteriores')
    <!-- ==========================
    	REFERENCE - START
    =========================== -->
    <section id="reference" class="content-second">
        <h2 class="scrollpoint sp-effect3">Trabalhos</h2>
        <p class="scrollpoint sp-effect3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in turpis quam. Nulla quis eleifend lectus.</p> 
   		<ul class="grid cs-style-4">
				<li>
					<figure class="scrollpoint sp-effect1">
						<div><img src="{{URL::to('site/image/ref1.png')}}" alt="img04"></div>
						<figcaption>
							<h3>Lorem ipsum</h3>
							<a href="portfolio.html">Show me</a>
						</figcaption>
					</figure>
				</li>
                
                <li>
					<figure class="scrollpoint sp-effect3">
						<div><img src="{{URL::to('site/image/ref2.png')}}" alt="img04"></div>
						<figcaption>
							<h3>Lorem ipsum</h3>
							<a href="portfolio.html">Show me</a>
						</figcaption>
					</figure>
				</li>
                
                <li>
					<figure class="scrollpoint sp-effect2">
						<div><img src="{{URL::to('site/image/ref3.png')}}" alt="img04"></div>
						<figcaption>
							<h3>Lorem ipsum</h3>
							<a href="portfolio.html">Show me</a>
						</figcaption>
					</figure>
				</li>
                
                <li>
					<figure class="scrollpoint sp-effect1">
						<div><img src="{{URL::to('site/image/ref4.png')}}" alt="img04"></div>
						<figcaption>
							<h3>Lorem ipsum</h3>
							<a href="portfolio.html">Show me</a>
						</figcaption>
					</figure>
				</li>
                
                <li>
					<figure class="scrollpoint sp-effect3">
						<div><img src="{{URL::to('site/image/ref5.png')}}" alt="img04"></div>
						<figcaption>
							<h3>Lorem ipsum</h3>
							<a href="portfolio.html">Show me</a>
						</figcaption>
					</figure>
				</li>
                
                <li>
					<figure class="scrollpoint sp-effect2">
						<div><img src="{{URL::to('site/image/ref6.png')}}" alt="img04"></div>
						<figcaption>
							<h3>Lorem ipsum</h3>
							<a href="portfolio.html">Show me</a>
						</figcaption>
					</figure>
				</li>
				
			</ul>
    
	</section>
    <!-- ==========================
    	REFERENCE - END 
    =========================== -->
@stop

@section('blog')
    <!-- ==========================
    	BLOG - START
    =========================== -->   
    <section id="blog" class="content-first">
    	<div class="container">
        	<h2 class="scrollpoint sp-effect3">Latest Blog Posts</h2>
        	<p class="scrollpoint sp-effect3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in turpis quam. Nulla quis eleifend lectus.</p> 
        </div>
            
        <div class="line hidden-xs">
        	<div class="container">
                <div class="row">
                    <div class="col-sm-4"><i class="fa fa-bullhorn"></i></div>
                    <div class="col-sm-4"><i class="fa fa-bullhorn"></i></div>
                    <div class="col-sm-4"><i class="fa fa-bullhorn"></i></div>
                </div>
            </div>
        </div>
		
        <div class="container">
            <div class="row"><!-- MAIN ROW - Start -->
            	<!-- BLOG POST - Start -->
                <div class="col-sm-4 scrollpoint sp-effect1">
                	<div class="blog-post">
                    	<div class="blog-body">
                    		<h3>Lorem Ipsum</h3>
                        	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        	<a href="blog.html" class="btn btn-primary">Read More</a>
                        </div>
                        <div class="blog-info">
                        	<a><i class="fa fa-comment"></i> 352</a>
                            <a><i class="fa fa-calendar"></i> 21/03/2014</a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <!-- BLOG POST - End -->
                
                <!-- BLOG POST - Start -->
                <div class="col-sm-4 scrollpoint sp-effect3">
                	<div class="blog-post">
                    	<div class="blog-body">
                    		<h3>Lorem Ipsum</h3>
                        	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        	<a href="blog.html" class="btn btn-primary">Read More</a>
                        </div>
                        <div class="blog-info">
                        	<a><i class="fa fa-comment"></i> 352</a>
                            <a><i class="fa fa-calendar"></i> 21/03/2014</a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <!-- BLOG POST - End -->
                
                <!-- BLOG POST - Start -->
                <div class="col-sm-4 scrollpoint sp-effect2">
                	<div class="blog-post">
                    	<div class="blog-body">
                    		<h3>Lorem Ipsum</h3>
                        	<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p>
                        	<a href="blog.html" class="btn btn-primary">Read More</a>
                        </div>
                        <div class="blog-info">
                        	<a><i class="fa fa-comment"></i> 352</a>
                            <a><i class="fa fa-calendar"></i> 21/03/2014</a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                </div>
                <!-- BLOG POST - End -->
                
            </div><!-- MAIN ROW - end -->
        </div><!-- CONTAINER - end -->
    </section>
    <!-- ==========================
    	BLOG - END 
    =========================== --> 
@stop

@section('precos')
    <!-- ==========================
    	PRICING - START
    =========================== -->   
    <section id="pricing" class="content-second">
        <div class="container">
        	<h2 class="scrollpoint sp-effect3">Pricing plans</h2>
        	<p class="scrollpoint sp-effect3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in turpis quam. Nulla quis eleifend lectus.</p> 
            <div class="row">
            <!-- PRICING TABLE FIRST - start --> 
                <div class="col-sm-4 scrollpoint sp-effect1"><!-- PRICING TABLE FIRST - start -->  
                    <div class="pricing-table"><!-- Pricing table - start --> 
                        <div class="pricing-headline">
                        	<h3>Lite</h3>
                            <div class="prize">$99</div>
                        </div>
                        
                        <ul class="list-unstyled">
                            <li><strong>150</strong> Lorem Ipsum</li>
                            <li><i class="fa fa-check"></i> Lorem Ipsum</li>
                            <li><i class="fa fa-times"></i> Lorem Ipsum</li>
                            <li><strong>150</strong> Lorem Ipsum</li>
                        </ul>
                        
                        <div class="btn-wrapper">
                        <a class="btn btn-primary">Order</a>
                        </div>
                        
                        
                    </div><!-- Pricing table - end-->      
           		</div><!-- COL-SM-4 - end --> 
                  
            	<div class="col-sm-4 scrollpoint sp-effect3"><!-- PRICING TABLE FIRST - start -->  
                    <div class="pricing-table active"><!-- Pricing table - start --> 
                        <div class="pricing-headline">
                        	<h3>Standard</h3>
                            <div class="prize">$150</div>
                        </div>
                        
                        <ul class="list-unstyled">
                            <li><strong>150</strong> Lorem Ipsum</li>
                            <li><i class="fa fa-check"></i> Lorem Ipsum</li>
                            <li><i class="fa fa-times"></i> Lorem Ipsum</li>
                            <li><strong>150</strong> Lorem Ipsum</li>
                        </ul>
                        
                        <div class="btn-wrapper">
                        <a class="btn btn-primary">Order</a>
                        </div>
                        
                        
                    </div><!-- Pricing table - end-->      
           		</div><!-- COL-SM-4 - end --> 
                
                <div class="col-sm-4 scrollpoint sp-effect2"><!-- PRICING TABLE FIRST - start -->  
                    <div class="pricing-table"><!-- Pricing table - start --> 
                        <div class="pricing-headline">
                        	<h3>Premium</h3>
                            <div class="prize">$350</div>
                        </div>
                        
                        <ul class="list-unstyled">
                            <li><strong>150</strong> Lorem Ipsum</li>
                            <li><i class="fa fa-check"></i> Lorem Ipsum</li>
                            <li><i class="fa fa-times"></i> Lorem Ipsum</li>
                            <li><strong>150</strong> Lorem Ipsum</li>
                        </ul>
                        
                        <div class="btn-wrapper">
                        <a class="btn btn-primary">Order</a>
                        </div>
                        
                        
                    </div><!-- Pricing table - end-->      
           		</div><!-- COL-SM-4 - end -->   
            
            </div>
        </div>
    </section>
    <!-- ==========================
    	PRICING - END 
    =========================== -->
@stop

@section('testemunhos')
    <!-- ==========================
    	TESTIMONIALS - START
    =========================== -->   
    <section id="testimonials" class="content-first">
        <div class="container">
        	<h2 class="scrollpoint sp-effect3 text-center">Testimonials</h2>
        	<p class="scrollpoint sp-effect3 text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce in turpis quam. Nulla quis eleifend lectus.</p> 
            <div class="row">
            	
                <!-- TESTIMONIAL 1 - START -->
                <div class="col-sm-6 scrollpoint sp-effect1">
                    <div class="media">
                        <a class="pull-left" href="#"><img class="media-object img-circle" src="{{URL::to('site/image/tom.png')}}" alt=""></a>
                        <div class="media-body">
                            <h4 class="media-heading">John Doe</h4>
                            <span>Webdesigner</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed volutpat est. Donec lobortis interdum volutpat. Maecenas bibendum dui quis pharetra tincidunt. Praesent posuere eu velit at scelerisque.</p>
                        </div>
                    </div>
                </div>
                <!-- TESTIMONIAL 1 - END -->
                
                <!-- TESTIMONIAL 2 - START -->
                <div class="col-sm-6 scrollpoint sp-effect2">
                    <div class="media">
                        <a class="pull-left" href="#"><img class="media-object img-circle" src="{{URL::to('site/image/suzanne.png')}}" alt=""></a>
                        <div class="media-body">
                            <h4 class="media-heading">John Doe</h4>
                            <span>Webdesigner</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sed volutpat est. Donec lobortis interdum volutpat. Maecenas bibendum dui quis pharetra tincidunt. Praesent posuere eu velit at scelerisque.</p>
                        </div>
                    </div>
                </div>
                <!-- TESTIMONIAL 2 - END -->
                
            </div>
            
        </div>
    </section>
    <!-- ==========================
    	TESTIMONIALS - END 
    =========================== -->
@stop

@section('contatos')
    <!-- ==========================
    	CONTACT - START
    =========================== -->   
    <section id="contact" class="content-first">
        <div class="container">
        	<h2 class="scrollpoint sp-effect3">Contact me</h2>
            <div class="contact-alert">
            </div>
            <div class="row">
            <!-- PRICING TABLE FIRST - start --> 
                <div class="col-sm-12">
                	<img src="{{URL::to('site/image/macbook.png')}}" class="img-responsive hidden-xs" alt="">
                    
                    <div class="macbook-inner black">
                    	<div class="row scrollpoint sp-effect4">
                        	<div class="col-sm-8">
                            	<h3 class="hidden-xs">Leave a message</h3>
                                
                                <form role="form" id="contactForm">

                                    <div class="form-group control-group">
                                        <div class="controls">
                                            <p class="help-block"></p>
                                            <input type="text" class="form-control" placeholder="First Name" id="firstname" data-validation-required-message="Please enter your first name." aria-invalid="false">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group control-group">
                                        <div class="controls">
                                            <p class="help-block"></p>
                                            <input type="text" class="form-control" placeholder="Last Name" id="lastname" data-validation-required-message="Please enter your last name." aria-invalid="false">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group control-group">
                                        <div class="controls">
                                            <p class="help-block"></p>
                                            <input type="email" class="form-control" placeholder="Email" id="email" data-validation-required-message="Please enter your email address." aria-invalid="false">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group control-group">
                                        <div class="controls">
                                            <p class="help-block"></p>
                                            <textarea class="form-control" placeholder="Message" id="message" data-validation-required-message="Please enter some message." aria-invalid="false"></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Send message</button>
                                    </div>
                                </form>
                                
                            </div>
                            <div class="col-sm-4">
                            
                            <img src="{{URL::to('site/image/jonathan.png')}}" class="contact-image image-responsive hidden-xs hidden-sm" alt="" />
                            	<div class="contact-info">
                                	<p>John Doe</p>
                                    <p>795 Folsom Ave, Suite 600</p>
                                    <p>San Francisco, CA 94107</p>
                                    <p>123-456-7890</p>
                                </div>
                            </div>
                    	</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- ==========================
    	CONTACT - END 
    =========================== -->
@stop

@section('footer')
    <!-- ==========================
    	FOOTER - START
    =========================== -->   
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 scrollpoint sp-effect3">
                
               			<ul class="brands brands-inline">
                            <li><a href="#"><i class="fa fa-facebook  hi-icon-effect-8"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>  
                    
                    <p>© John Doe The Freelancer 2014 All right reserved. Designed by <a href="http://pixelized.cz" target="_blank" class="btn btn-footer">Pixelized Studio</a></p>
                </div>   	
            </div>
        </div>
    </section>
    <!-- ==========================
    	FOOTER - END 
    =========================== -->
@stop
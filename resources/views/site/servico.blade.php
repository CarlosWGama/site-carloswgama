@extends('layouts.site')

@section('header')
	<a href="#page-top" class="scroll-up scroll"><i class="fa fa-chevron-up"></i></a>
    <h1>Freelancer</h1>
	
    <!-- ==========================
    	HEADER - START 
    =========================== -->
     <section id="blog-header">
		<div class="container">
            <div class="row">
                    <div class="col-sm-4 col-xs-6">
                       <a href="{{route('home')}}"><i class="fa fa-arrow-left arrow-left"></i> HOME</a>
                    </div>
                    
                    <div class="col-sm-4">    
                    </div>
                    

                    <div class="col-sm-4 col-xs-6">
                        
                        @unless(empty($servico->link))
                        <div class="blog-header-menu-right">
                       	    <a href="{{$servico->link}}" target="_blank">Visitar Serviço <i class="fa fa-arrow-right arrow-right"></i></a>
                        </div>  
                        @endunless

                    </div>  	
            </div>
		</div>
    </section>
@endsection

@section('conteudo_principal')
     <!-- ==========================
    	SERVICO  - START 
    =========================== -->
    <section id="portfolio-page-content">
        <div class="container">
            <div class="row">

            <!-- TITULO -->
            <h2>{{$servico->cliente}}</h2>


                <div class="col-lg-6 col-sm-8 col-md-8 col-md-offset-2 col-sm-offset-2 col-lg-offset-3 showcase-carousel  scrollpoint sp-effect2">
                      <img src="{{url('site/image/imac.png')}}" class="img-responsive hidden-xs" alt="">
                      
                      <div id="carousel-reference" class="carousel slide" data-ride="carousel">
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner">
                              <div class="item active"><img src="{{url('storage/servicos/' . $servico->imagem)}}" alt=""></div>
                          </div>
                    
                      </div> 
                 </div>  
             </div>
             
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-1">
                     <div class="portfolio-text">
                         <p>{{$servico->descricao}}</p>
                     </div>
                 </div>
             </div>
             
         </div>
    </section>
@endsection

@section('footer')
   @include('site.shared._footer')
@endsection 
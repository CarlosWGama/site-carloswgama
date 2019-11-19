@extends('layouts.site')

@push('css')
    <link href="{{URL::to('/site/css/mobile.css')}}" rel="stylesheet" type="text/css">

    <style>
        #download {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        #download img {
            width: 200px;
        }
    </style>

@endpush

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
                        
                        @unless(empty($aplicativo->online))
                        <div class="blog-header-menu-right">
                       	    <a href="{{$aplicativo->online}}" target="_blank">Visitar Serviço <i class="fa fa-arrow-right arrow-right"></i></a>
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
            <h2>{{$aplicativo->titulo}}</h2>

            

            <div class="contenitore">
                @unless(empty($aplicativo->online))
                <div class="phone-container dark">
                    <div class="phone-shape small">
                        <span class="button-one buttons"></span>
                        <span class="button-two buttons"></span>
                        <span class="button-three buttons"></span>
                        <span class="button-four button last"></span>
                        <div class="top-details">
                            <span class="camera"></span>
                            <span class="circle"></span>
                            <span class="speaker"></span>
                        </div>
                        <div class="phone-screen">
                            <iframe name="preview" src="{{$aplicativo->online}}" style="border:none"></iframe> 
                        </div>
                        <div class="circle-button"></div>
                    </div>
                </div>
                @endunless
                <div class="description">
                    <h3>{{$aplicativo->titulo}}</h3>
                    <h4>{!!nl2br($aplicativo->descricao)!!}</h4>

                    <div id="download">
                        @unless(empty($aplicativo->android))
                        <a href="{{$aplicativo->android}}" target="_blank">
                            <img src="{{url('site/image/playstore.png')}}"/>
                        </a>
                        @endunless
                        @unless(empty($aplicativo->ios))
                        <a href="{{$aplicativo->ios}}" target="_blank">
                            <img src="{{url('site/image/appstore.png')}}"/>
                        </a>
                        @endunless
                    </div>
                </div>
                <div class="clr"></div>
            </div>


             </div>
             
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-1">
                     <div class="portfolio-text">
                         <p></p>
                     </div>
                 </div>
             </div>
             
         </div>
    </section>
@endsection

@section('footer')
   @include('site.shared._footer')
@endsection 
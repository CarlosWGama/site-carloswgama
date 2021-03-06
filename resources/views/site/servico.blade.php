@extends('layouts.site')


@push('css')

    <style>
        #download {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
        }

        #download img {
            width:  200px;
        }

        .description {
            width: 400px;
        }

        .description img {
            margin: 20px;
            max-height:250px;
            border-radius: 20px;
        }
        #fotos {
            width: 50%;
            display: flexbox;
            flex-wrap: wrap;
            justify-content: space-around;
            /* border: 1px solid black; */
        }

        #fotos img { width: 175px; margin: 5px; border-radius: 10px;}
        #fotos img:hover { opacity: 0.3; cursor: pointer}

        .link-externo {
            border:1px white solid;
            border-radius: 10px;
            width: 200px;
            padding: 20px 0px;
            color: black;
            background:white;
        }

        .link-externo:hover { background-color: rgba(255, 255, 255, 0.3); color: black; }


        #popup { position: fixed; display: none; height: 100%; width: 100%; top: 0; cursor: pointer}
        #item-popup { display: flex; height: 100%; flex: 1; background-color: rgba(0, 0, 0, 0.5  ); justify-content: center; align-items: center;}
        #img-pop { max-height: 95%}
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

            </div>
		</div>
    </section>
@endsection

@section('conteudo_principal')

       <!-- POP UP -->
       <div id="popup">
        <div id="item-popup">
            <img id="img-pop" src=""/>
        </div>
    </div> 

     <!-- ==========================
    	SERVICO  - START 
    =========================== -->
    <section id="portfolio-page-content">
        <div class="container">
            <div class="row">

            <!-- TITULO -->
            <h2>{{$servico->titulo}}</h2>
            <p>{{$servico->resumo}}</p>

            

            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <div class="description">
                        
                    <img id="image" src="{{url('storage/servicos/'.$servico->imagem)}}" />

                    <h3>{{$servico->titulo}}</h3>
                    <h4>{!!nl2br($servico->descricao)!!}</h4>

                </div>

                <div id="fotos">
                    @foreach ($servico->fotos as $foto)
                    <img class="show-pop" src="{{asset('storage/servicos_fotos/'.$foto->arquivo)}}" data-img="{{asset('storage/servicos_fotos/'.$foto->arquivo)}}" />
                    @endforeach
                </div>
            </div>

            <div class="clr"></div>

            @if ($servico->android || $servico->ios || $servico->github)
            <h3>Disponível em:</h3>
            @endif
            
            <div id="download">
                @unless(empty($servico->android))
                <a href="{{$servico->android}}" target="_blank">
                    <img src="{{url('site/image/playstore.png')}}"/>
                </a>
                @endunless
                @unless(empty($servico->ios))
                <a href="{{$servico->ios}}" target="_blank">
                    <img src="{{url('site/image/appstore.png')}}"/>
                </a>
                @endunless
                @unless(empty($servico->github))
                <a href="{{$servico->github}}" target="_blank">
                    <img src="{{url('site/image/github.png')}}"  style="border-radius: 10px;"/>
                </a>
                @endunless
                @unless(empty($servico->externo))
                <a href="{{$servico->externo}}" target="_blank" class="link-externo">
                    IR PARA O CONTEÚDO<br/>
                    <i class="fa fa-arrow-right"></i>
                </a>
                @endunless
            </div>

            <div class="clr"></div>
            
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

@push('scripts')

<script type="text/javascript">
    $('#popup').click(() => {
        $('#popup').hide('slow');
    })

    $('.show-pop').click(function() {
        $('#img-pop').attr('src', $(this).attr('src'))
        $('#popup').show('slow');
    })
</script>   
@endpush

@section('footer')
   @include('site.shared._footer')
@endsection 
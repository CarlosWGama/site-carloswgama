 <!-- ==========================
    	FOOTER - START
    =========================== -->   
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 scrollpoint sp-effect3">
                
           			<ul class="brands brands-inline">
                        @foreach($redes_sociais as $social)
                            <li>
                                <a href="{{$social->link}}" target="_blank"><i class="fa {{$social->class_icon}} "></i></a>
                            </li>
                        @endforeach
                    </ul>  
                    
                    <p>© Carlos W. Gama</p>
                </div>   	
            </div>
        </div>
    </section>
    <!-- ==========================
    	FOOTER - END 
    =========================== -->
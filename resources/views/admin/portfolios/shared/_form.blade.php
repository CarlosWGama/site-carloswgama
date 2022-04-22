<!-- DADOS DO PORTOFOLIO -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados do Portfólio</h2>
                <div class="clearfix"></div>
            </div>
    
            <div class="x_content">
                <br />

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            
                 <!-- Título -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Título:</label>
        
                    <div class="col-md-6 col-sm-3 col-xs-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="titulo" value="{{old('titulo', $portfolio->titulo)}}">
                        </div>
                    </div>
                </div>

                <!-- Descrição -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-12s">
                       
                            <textarea class="form-control" name="descricao"> {{old('descricao', $portfolio->descricao)}}</textarea>
                       
                    </div>
                </div>

               
                <!-- Imagem -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagem:</label>
                    
                    @if (!empty($portfolio->imagem))
                        <img src="{{asset('storage/portfolios/'.$portfolio->imagem)}}" width="200"/><br clear="both"/>
                    @endif

                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="file" name="imagem"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
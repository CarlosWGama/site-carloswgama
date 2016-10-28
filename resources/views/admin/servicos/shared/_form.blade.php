<!-- DADOS DO SERVICO -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados do Serviço</h2>
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
            
                <!-- Cliente -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="cliente" value="{{old('cliente', $servico->cliente)}}">
                        </div>
                    </div>
                </div>

                <!-- Link -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Link:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-6s">
                        <div class="input-group">
                            <input type="text" class="form-control" name="link" value="{{old('link', $servico->link)}}">
                        </div>
                    </div>
                </div>

                 <!-- Descrição -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-12s">
                        <textarea class="form-control" name="descricao"> {{old('descricao', $servico->descricao)}}</textarea>
                    </div>
                </div>

               
                <!-- Imagem -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagem:</label>
                    
                    @unless (empty($servico->imagem))
                        <img src="{{asset('storage/servicos/'.$servico->imagem)}}" width="200"/><br clear="both"/>
                    @endunless

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
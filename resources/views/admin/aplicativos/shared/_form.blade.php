<!-- DADOS DO SERVICO -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados do Aplicativo</h2>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Título:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="input-group">
                            <input type="text" class="form-control" name="titulo" value="{{old('titulo', $aplicativo->titulo)}}">
                        </div>
                    </div>
                </div>

                <!-- Link -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Online:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-6s">
                        <div class="input-group">
                            <input type="text" class="form-control" name="online" value="{{old('online', $aplicativo->online)}}">
                        </div>
                    </div>
                </div>

                <!-- Link -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Android:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-6s">
                        <div class="input-group">
                            <input type="text" class="form-control" name="android" value="{{old('android', $aplicativo->android)}}">
                        </div>
                    </div>
                </div>

                <!-- Link -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">iOS:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-6s">
                        <div class="input-group">
                            <input type="text" class="form-control" name="ios" value="{{old('ios', $aplicativo->ios)}}">
                        </div>
                    </div>
                </div>

                 <!-- Descrição -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-12s">
                        <textarea class="form-control" name="descricao"> {{old('descricao', $aplicativo->descricao)}}</textarea>
                    </div>
                </div>

               
                <!-- Imagem -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Imagem:</label>
                    
                    @unless (empty($aplicativo->imagem))
                        <img src="{{asset('storage/aplicativos/'.$aplicativo->imagem)}}" width="200"/><br clear="both"/>
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
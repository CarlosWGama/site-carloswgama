<!-- DADOS DO TESTEMUNHO -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados do Testemunho</h2>
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
            
                <!-- Nome -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nome:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="text" class="form-control" name="nome" value="{{old('nome', $testemunho->nome)}}">
                        </div>
                    </div>
                </div>

                <!-- Cargo -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cargo:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="text" class="form-control" name="cargo" value="{{old('cargo', $testemunho->cargo)}}">
                        </div>
                    </div>
                </div>

               <!-- Comentário -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Comentário:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-12s">
                        <textarea class="form-control" name="comentario"> {{old('comentario', $testemunho->comentario)}}</textarea>
                    </div>
                </div>

               
                <!-- Imagem -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar:</label>
                    
                    @unless (empty($testemunho->avatar))
                        <img src="{{asset('storage/testemunhos/'.$testemunho->avatar)}}" width="200"/><br clear="both"/>
                    @endunless

                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="file" name="avatar"/>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
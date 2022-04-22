<!-- DADOS DO USUARIO -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados do ano</h2>
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
            
                <!-- Descrição -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group">
                            <input type="text" class="form-control" name="descricao" value="{{old('descricao', $ano->descricao)}}">
                        </div>
                    </div>
                </div>

                <!-- Ano -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Ano:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="integer" class="form-control" name="ano" value="{{old('ano', $ano->ano)}}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
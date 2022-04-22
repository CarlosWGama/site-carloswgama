<!-- DADOS DA HABILIDADE -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados da Habilidade</h2>
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
            
                <!-- Habilidade -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Habilidade:</label>
        
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="input-group">
                            <input type="text" class="form-control" name="habilidade" value="{{old('habilidade', $habilidade->habilidade)}}">
                        </div>
                    </div>
                </div>

                <!-- Porcentagem -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Porcentagem:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="integer" class="form-control" name="porcentagem" value="{{old('porcentagem', $habilidade->porcentagem)}}">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- DADOS DO USUARIO -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados da Rede Social</h2>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Link:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="text" class="form-control" name="link" value="{{old('link', $social->link)}}">
                        </div>
                    </div>
                </div>

                <!-- Class do Icone -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class do Icone:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="tex" class="form-control" name="class_icon" value="{{old('class_icon', $social->class_icon)}}">
                        </div>
                    </div>
                </div>

                <!-- Class do Icone -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class do Icone:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <select id="heard" class="form-control" name='lado' required>
                                <option value="0" {{old('lado', $social->lado) == 0 ? 'selected' : ''}}>Esquerda</option>
                                <option value="1" {{old('lado', $social->lado) == 1 ? 'selected' : ''}}>Direita</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
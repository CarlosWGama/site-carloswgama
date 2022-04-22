<!-- DADOS DO USUARIO -->
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Dados do Usuário</h2>
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
                            <input type="text" class="form-control" name="nome" value="{{old('nome', $usuario->nome)}}">
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Email:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="email" class="form-control" name="email" value="{{old('email', $usuario->email)}}">
                        </div>
                    </div>
                </div>

                <!-- Senha -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Senha:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="password" class="form-control" name="senha">
                        </div>
                    </div>
                </div>

                <!-- Confirmar senha -->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">*Confirmar Senha:</label>
        
                    <div class="col-md-3 col-sm-3 col-xs-6s">
                        <div class="input-group">
                            <input type="password" class="form-control" name="senha_confirm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
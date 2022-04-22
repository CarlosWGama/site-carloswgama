@extends('layouts.admin')


@section('contents')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Biografia <small>>> Editar</small></h3>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                
            @if(isset($sucesso_mensagem))
            <div class="alert alert-success">
                {{$sucesso_mensagem}}
            </div>
            @endif


            <!-- FORM -->
            <form class="form-horizontal" method="post" action="{{route('admin.biografia.atualizar')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
               
               <!-- DADOS Da BIOGRAFIA -->
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Biográfia</h2>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Titulo:</label>
                        
                                     <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="titulo" value="{{old('titulo', $biografia->titulo)}}">
                                        </div>
                                    </div>
                                </div>
                            
                                <!-- Descrição -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Descrição:</label>
                        
                                    <div class="col-md-6 col-sm-6 col-xs-12s">
                                        <textarea  class="form-control" name="descricao" rows="3">{{old('descricao', $biografia->descricao)}}</textarea>
                                    </div>
                                </div>

                                <!-- Avatar -->
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Avatar:</label>
                                    
                                    @if (!empty($biografia->avatar))
                                        <img src="{{asset('storage/'.$biografia->avatar)}}" width="200"/><br clear="both"/>
                                    @endif

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
                
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>

            <div class="clearfix"></div>
        </div>
    </div>

</div>
<br />

@stop

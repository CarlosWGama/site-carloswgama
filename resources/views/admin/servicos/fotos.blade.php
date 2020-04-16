@extends('layouts.admin')

@push('css')
    <style>
    #fotos {
        padding: 0px 20px;
    }

    .foto-img {
        max-height: 100px;
    }
    </style>
@endpush

@section('contents')
<div class="row">

    <h3>Cadastradas foto</h3>
    
    <form action="{{route('admin.servicos.fotos.cadastrar', ['id' => $servico->id])}}" method="post" enctype="multipart/form-data">

        <div class="card-body card-block">
            <!-- FORMULARIO -->
            <!-- ERRO -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- SUCESSO -->
            @if(session('sucesso'))
                <div class="alert alert-success" role="alert" style="margin:10px 10px">
                    {{session('sucesso')}}
                </div>
            @endif

            {{csrf_field()}}

            <div id="fotos">
                <div class="image-upload-wrap">
                <input class="file-upload-input" type='file' name="arquivo" onchange="readURL(this);" accept="image/*" />
                <div class="drag-text">
                    <h3>Arraste ou clique aqui para adicionar sua imagem</h3>
                </div>
                </div>
            
                <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remover <span class="image-title">imagem</span></button>
                </div>
                </div>
            </div>
        </div>
        
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-save"></i> Cadastrar
            </button>
        </div>
    </form>
    <hr/>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Fotos <small>>> Listar</small></h3>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            @if(isset($erro_mensagem))
                <div class="alert alert-danger">{{$erro_mensagem}}</div>
            @endif

            <div class="col-md-12 col-sm-12 col-xs-12">
                
            <!-- SERVICOS -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Fotos</h2>
                            <div class="clearfix"></div>
                        </div>
                
                        <div class="x_content">
                            <br />
                        
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="70%">Foto</th>
                                        <th width="20%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ENTIDADES -->
                                    @foreach($fotos as $foto)
                                    <tr>
                                        <!-- id -->
                                        <th scope="row">{{$foto->id}}</th>
                                        <!-- Cliente-->
                                        <td><img class="foto-img" src="{{asset('storage/servicos_fotos/' . $foto->arquivo)}}"/></td>
                                        <!-- Ações-->
                                        <td>
                                            
                                            <!-- excluir -->
                                            <a href="javascript:;">
                                                <i class="fa fa-trash excluir-item" data-id="{{$foto->id}}"></i>
                                                <form id="form-excluir-{{$foto->id}}" action="{{route('admin.servicos.fotos.excluir', ['id' => $servico->id, 'fotoID' => $foto->id])}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE')}}
                                                </form>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- ENTIDADES[FIM] -->
                                </tbody>
                            </table>

                                {{ $fotos->links() }}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<br />
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('.excluir-item').on('click', function(){
            var id = $(this).data('id');
            $.confirm({
                title: 'Excluir',
                content: 'Deseja realmente excluir esse item?',
                confirmButton: 'Excluir',
                cancelButton: 'Não Excluir',
                confirm: function(){
                    $('#form-excluir-'+id).submit();
                },
                cancel: function(){
            
                }
            });
        });
    });
</script>
@endpush
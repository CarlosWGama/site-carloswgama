@extends('layouts.admin')

@section('contents')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Usuários <small>>> Listar</small></h3>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            @if(isset($erro_mensagem))
                <div class="alert alert-danger">{{$erro_mensagem}}</div>
            @endif

            @if(isset($sucesso_mensagem))
                <div class="alert alert-success">{{$sucesso_mensagem}}</div>
            @endif



            <div class="col-md-12 col-sm-12 col-xs-12">
                
            <!-- USUARIOS -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Usuários</h2>
                            <div class="clearfix"></div>
                        </div>
                
                        <div class="x_content">
                            <br />
                        
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="35%">Nome</th>
                                        <th width="35%">Email</th>
                                        <th width="10%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- ENTIDADES -->
                                    @foreach($usuarios as $usuario)
                                    <tr>
                                        <!-- id -->
                                        <th scope="row">{{$usuario->id}}</th>
                                        <!-- Nome-->
                                        <td>{{$usuario->nome}}</td>
                                        <!-- Fornecedor-->
                                        <td>{{$usuario->email}}</td>
                                        <!-- Ações-->
                                        <td>
                                            <!-- excluir -->
                                            <a href="javascript:;">
                                                <i class="fa fa-trash excluir-item" data-id="{{$usuario->id}}"></i>
                                                <form id="form-excluir-{{$usuario->id}}" action="{{route('admin.usuarios.excluir', ['id' => $usuario->id])}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE')}}
                                                </form>
                                            </a>
                                            
                                            <!-- editar -->
                                            <a href="{{route('admin.usuarios.editar', ['id' => $usuario->id])}}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- ENTIDADES[FIM] -->
                                </tbody>
                            </table>

                                {{ $usuarios->links() }}
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
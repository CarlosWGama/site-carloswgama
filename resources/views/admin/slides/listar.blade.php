@extends('layouts.admin')

@section('contents')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Slides <small>>> Listar</small></h3>
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
                
            <!-- SLIDES -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Slides</h2>
                            <div class="clearfix"></div>
                        </div>
                
                        <div class="x_content">
                            <br />
                        
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="35%">Descrição</th>
                                        <th width="35%">Class do Icone</th>
                                        <th width="10%">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- SLIDES -->
                                    @foreach($slides as $slide)
                                    <tr>
                                        <!-- id -->
                                        <th scope="row">{{$slide->id}}</th>
                                        <!-- Descrição -->
                                        <td>{{$slide->descricao}}</td>
                                        <!-- Class do Icone-->
                                        <td>{{$slide->class_icon}}</td>
                                        <!-- Ações-->
                                        <td>
                                            <!-- excluir -->
                                            <a href="javascript:;">
                                                <i class="fa fa-trash excluir-item" data-id="{{$slide->id}}"></i>
                                                <form id="form-excluir-{{$slide->id}}" action="{{route('admin.header.slides.excluir', ['id' => $slide->id])}}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE')}}
                                                </form>
                                            </a>
                                            
                                            <!-- editar -->
                                            <a href="{{route('admin.header.slides.editar', ['id' => $slide->id])}}">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- SLIDES[FIM] -->
                                </tbody>
                            </table>

                                {{ $slides->links() }}
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
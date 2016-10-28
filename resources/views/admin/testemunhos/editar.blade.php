@extends('layouts.admin')


@section('contents')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Testemunhos <small>>> Editar</small></h3>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                

            <!-- FORM -->
            <form class="form-horizontal" method="post" action="{{route('admin.testemunhos.atualizar', ['id' => $testemunho->id])}}" enctype="multipart/form-data" >
                {{ csrf_field() }}
                {{ method_field('PUT') }}
               
                @include('admin.testemunhos.shared._form')
                
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

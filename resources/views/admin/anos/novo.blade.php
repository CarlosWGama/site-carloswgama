@extends('layouts.admin')


@section('contents')
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="dashboard_graph">

            <div class="row x_title">
                <div class="col-md-6">
                    <h3>Anos <small>>> Novo</small></h3>
                </div>
                <div class="col-md-6">

                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                

            <!-- FORM -->
            <form class="form-horizontal" method="post" action="{{route('admin.biografia.anos.cadastrar')}}" >
                {{ csrf_field() }}
               
                @include('admin.anos.shared._form')
                
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
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

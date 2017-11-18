@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cores
        <small>Cores para produto</small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{route('manager')}}">
                <i class="fa fa-shopping-bag "></i> Visão Geral</a>
        </li>
        <li class="active">Cores</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Cores de produto cadastradas </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <a href="{{route('manager.colors.new')}}" type="button" class="btn bg-olive btn-sm" data-toggle="tooltip" title="Cadastrar nova cor">
                            <i class="fa fa-plus"></i> Novo
                        </a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Cor</th>
                                <th style="width:30px">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nome da cor x.y.z</td>
                                <td>
                                    <button class="btn btn-default  btn-sm"> Ações</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Nome da cor x.y.z</td>
                                <td>
                                    <button class="btn btn-defaultinfo  btn-sm"> Ações</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Nome da cor x.y.z</td>
                                <td>
                                    <button class="btn btn-default  btn-sm"> Ações</button>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cor</th>
                                <th>Ações</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
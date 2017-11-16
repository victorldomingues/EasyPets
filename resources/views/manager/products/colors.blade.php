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
                    <h3 class="box-title">Cores de produto cadastradas</h3>
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
                                <td><button class="btn btn-info"> Ações</button></td>
                            </tr>
                            <tr>
                                <td>Nome da cor x.y.z</td>
                                <td><button class="btn btn-info"> Ações</button></td>
                            </tr>
                            <tr>
                                <td>Nome da cor x.y.z</td>
                                <td><button class="btn btn-info"> Ações</button></td>
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
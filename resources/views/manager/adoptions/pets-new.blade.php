@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Cadastro de Pet
    <small>Cadastro de animal</small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="{{route('manager')}}">
        <i class="fa fa-shopping-bag "></i> Visão Geral</a>
    </li>
    <li>
      <a href="{{route('manager.categories')}}">
         Pets
      </a>
    </li>
    <li class="active">Novo Pet</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Cadastro de pet</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{route('manager.pets.store')}}" method="POST">
          {{ csrf_field() }}
          <div class="box-body">
            <div class="form-group">

            <fieldset>
              <legend>Informação do pet</legend>

              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)">
            </div>

            <div class="form-group">
              <label for="name">Race</label>
              <input type="text" class="form-control" id="race" name="race" placeholder="(Opcional)">
            </div>

            <div class="form-group">
              <label for="name">Descrição</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="(Opcional)">
            </div>

            </fieldset>       
            
            <div class="checkbox">
              <label>
                <input type="checkbox" id="isDeleted" name="isDeleted" > Inativa
              </label>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
      <!-- /.box -->

    </div>
  </div>
  <!-- /.row -->
</section>
@endsection
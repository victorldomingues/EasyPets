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
		<li>
			<a href="{{route('manager.colors')}}">
				Cores </a>
		</li>
		<li class="active">Nova cor</li>
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
					<h3 class="box-title">Cadastro de cor</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" action="{{route('manager.colors.store')}}">
         {{ csrf_field() }}
					<div class="box-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nome da cor</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)" required>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Descrição</label>
							<input type="text" class="form-control" id="description" name="description" placeholder="(Opcional)" required>
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox" id="deleted" name="deleted"> Inativo
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
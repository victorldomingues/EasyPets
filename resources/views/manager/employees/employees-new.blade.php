@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Funcionário
		<small>Funcionário da loja</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.employees')}}">
				Funcionarios </a>
		</li>
		<li class="active">Novo funcionário</li>
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
					<h3 class="box-title">Cadastro de Funcionário</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->

				@if(Auth::user()->type == 0)
				<form role="form" method="POST" @isset($manager) action="{!! route('manager.employees.update', ['id'=>$manager->Id])  !!}"
				 @endisset @empty($manager) action="{{route('manager.employees.store')}}" @endempty>


					<div class="box-body">

						{{ csrf_field() }}

						<div class="form-group">
							<label for="">Nome</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)" @isset($manager) value="{{$manager->Name}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="(Obrigatório)" @isset($manager) value="{{$manager->Email}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="(Obrigatório)" @isset($manager) value="{{$manager->Cpf}}"
							 @endisset required>
						</div>


						<div class="form-group">
							<label>Tipo</label>
							<select class="form-control select2" id="role" name="role" style="width: 100%;" >
								<option value="0" selected="selected">Gerente</option>
								<option value="1">Adminstrador</option>
							</select>
						</div>

					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>
						@isset($customer)
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"> Remover </button>
						@endisset
					</div>

				</form>
				@endif
			</div>

		</div>
	</div>
	<!-- /.row -->
</section>
@isset($customer)
<div class="modal modal-danger fade" id="modal-danger">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="POST" action="{!! route('manager.customers.destroy', ['id'=>$customer->Id])  !!}">
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Atenção !!!</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente remover o Funcionário " {{ $customer->Name }} "</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-outline">Remover</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endisset @endsection
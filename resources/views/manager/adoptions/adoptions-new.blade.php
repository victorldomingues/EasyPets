@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Adoção
		<small>Adoções </small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.customers')}}">
				Adoções </a>
		</li>
		<li class="active">Nova Adoção</li>
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
					<h3 class="box-title">Cadastro de adoção</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" @isset($customer) action="{!! route('manager.customers.update', ['id'=>$customer->Id])  !!}"
				 @endisset @empty($customer) action="{{route('manager.customers.store')}}" @endempty>


					<div class="box-body">

						{{ csrf_field() }}

						@include('manager.customers.customers-form')

					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>
						@isset($customer)
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"> Remover </button>
						@endisset
					</div>

				</form>
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
					<p>Deseja realmente remover o cliente " {{ $customer->Name }} "</p>
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
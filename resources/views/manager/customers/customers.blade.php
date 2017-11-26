@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Clientes
		<small>Clientes da loja</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li class="active">Clientes</li>
	</ol>
</section>
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Clientes da loja cadastrados </h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<a href="{{route('manager.customers.new')}}" type="button" class="btn bg-olive btn-sm" data-toggle="tooltip" title="Cadastrar novo cliente">
							<i class="fa fa-plus"></i> Novo
						</a>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Cliente</th>
								<th style="width:115px">Ações</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($customers as $customer)
							<tr>
								<td> {{ $customer->Name }} </td>
								<td>
									<div class="btn-group">
										<a href="{!! route('manager.customers.show', ['id'=>$customer->Id])  !!}" class="btn btn-sm btn-default">Visualizar</a>
										<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="{!! route('manager.customers.show', ['id'=>$customer->Id])  !!}">Visualizar</a>
											</li>
											<li>
												<a href="{!! route('manager.customers.edit', ['id'=>$customer->Id])  !!}">Editar</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="{!! route('manager.customers.destroy', ['id'=>$customer->Id])  !!}">Excluir</a>
											</li>

										</ul>
									</div>
								</td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th>Cliente</th>
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
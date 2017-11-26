@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Minhas compras
		<small>Minhas compras da loja</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li class="active">Minhas compras</li>
	</ol>
</section>
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Minhas compras da </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>Data da compra</th>
								<th>Total </th>
								<th style="width:115px">Ações</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($orders as $order)
							<tr>
								<td> {{ $order->Id }} </td>
								<th> {{$order->ClosedDateFormated}}</th>
								<th> {{ 'R$ '.number_format($order->Total, 2, ',', '.') }}</th>
								<td>
									<div class="btn-group">
										<a href="{!! route('manager.orders.show', ['id'=>$order->Id])  !!}" class="btn btn-sm btn-default">Visualizar</a>
										<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="{!! route('manager.orders.show', ['id'=>$order->Id])  !!}">Visualizar</a>
											</li>
											<li>
												<a href="{!! route('manager.orders.edit', ['id'=>$order->Id])  !!}">Editar</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="#">Excluir</a>
											</li>

										</ul>
									</div>
								</td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Data da compra</th>
								<th>Total </th>
								<th style="width:115px">Ações</th>
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
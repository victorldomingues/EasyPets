@extends('layouts.app') @section('content')
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
		<li>Minhas compras</li>
		<li class="active"> # {{$order->Id}}</li>
	</ol>
</section>

<div class="row">
<!-- Main content -->
<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<em class="fa fa-shopping-bag"> </em>
				<b> Easy</b>Pets
				<small class="pull-right">Data: {{date('d/m/Y')}}</small>
			</h2>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			De
			<address>
				<strong>EasyPets.</strong>
				<br> R. Casa do Ator, 275 - Vila Olimpia,
				<br> São Paulo - SP, 04546-001.
				<br> Telefone: (804) 123-5432
				<br> E-mail: contato@easypets.com.br
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			Para
			<address>
				<strong>{{$customer->Name}}</strong>
				@isset($customer->PublicPlace)
				<br> {{$customer->PublicPlace}} , {{$customer->Number}}
				<br> {{$customer->City}}, {{$customer->State}} - {{$customer->Country}} - {{$customer->ZipCode}}
				<br> E-mail: {{$customer->Email}}
				<br>
				
				@endisset {{--
				<br> Telefone: (555) 539-1037 --}} @empty($customer->PublicPlace)
				<br> E-mail: {{$customer->Email}}
				<br> Você precisa informar o endereço
				<br>
				
				@endempty
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<b>Invoice #{{$order->Id}}</b>
			<br>
			<br>
			<b>Compra ID:</b> {{$order->Id}}
			<br>
			<b>Pagamento em :</b> {{date('d/m/Y')}}
			<br>
			<b>Conta:</b> {{$customer->Id}}
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- Table row -->
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Descrição</th>
						<th>Quantidade</th>
						<th>Preço unitário</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td> # {{$product->ProductId}}</td>
						<td> {{$product->Name}}</td>
						<td> {{$product->Quantity}} </td>
						<td> {{ 'R$ '.number_format($product->UnitPrice, 2, ',', '.') }} </td>
						<th>{{ 'R$ '.number_format(($product->UnitPrice * $product->Quantity), 2, ',', '.') }}</th>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<div class="row">
		<!-- accepted payments column -->
		<div class="col-xs-6">
			<p class="lead">Formas de pagamento:</p>
			<img src="{{asset('')}}template/dist/img/credit/visa.png" alt="Visa">
			<img src="{{asset('')}}template/dist/img/credit/mastercard.png" alt="Mastercard">
			<img src="{{asset('')}}template/dist/img/credit/american-express.png" alt="American Express">
			<img src="{{asset('')}}template/dist/img/credit/paypal2.png" alt="Paypal">
		</div>
		<!-- /.col -->
		<div class="col-xs-6">
			<p class="lead">Valores a pagar {{date('d/m/Y')}}</p>

			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Subtotal:</th>
						<td> {{ 'R$ '.number_format($order->Total, 2, ',', '.') }}</td>
					</tr>
					<tr>
						<th>Desconto</th>
						<td> {{ 'R$ '.number_format($order->Discount, 2, ',', '.') }}</td>
					</tr>
					<tr>
						<th>Total:</th>
						<td>
							@isset($products) {{ 'R$ '.number_format($order->Total, 2, ',', '.') }} @endisset
						</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- this row will not appear when printing -->
	<div class="row no-print">
		<div class="col-xs-12">
			<a href="invoice-print.html" target="_blank" class="btn btn-default">
				<i class="fa fa-print"></i> Imprimir</a>
			@if($order->State
			< 3) <button type="button" class="btn btn-danger pull-right" style="margin-right: 5px;">
				<i class="fa fa-trash-o"></i> Cancelar
				</button>
				@endif
		</div>
	</div>
</section>

</div>



@endsection
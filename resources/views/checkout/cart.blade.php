@extends('layouts.store') @section('content')
<section class="content-header">
	<h1>
		Carrinho
		<small>de Compras</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{asset('')}}">
				<i class="fa fa-shopping-bag"></i> Página Inicial</a>
		</li>
		<li class="active">Carrinho</li>
	</ol>
	<hr>
</section>
@if($errors->any())
<div class="pad margin no-print">
	<div class="callout callout-danger" style="margin-bottom: 0!important;">
		<h4>
			<i class="fa fa-danger"></i> ATENÇÃO:</h4>
		{{$errors->first()}}
	</div>
</div>
@endif @empty($products[0])
<div class="pad margin no-print">
	<div class="callout callout-danger" style="margin-bottom: 0!important;">
		<h4>
			<i class="fa fa-danger"></i> CARRINHO VAZIO:</h4>
		Carrinho vazio mas não fique triste: continue comprando.
	</div>
</div>
@endempty @isset($products[0]) @include('checkout.components.itemsTable', ['products' => $products]) @endisset

<section class="content-header">
	<form method="POST" action="{{route('order.finish')}}">
		<h1 style="font-size:50px" class="text-right">
			<small>Total</small>
			@empty($products[0])
			<a class="btn btn-info checkout pull-left" href="{{route('home')}}" role="button">Continuar comprando</a>
			@endempty @isset($products[0]) {{ 'R$ '.number_format(($products->sum('Total')), 2, ',', '.') }}{{ csrf_field() }}
			<button type="submit" class="btn btn-warning btn-lg checkout pull-left">Finalizar compra</a>

				@endisset
		</h1>
	</form>

	<hr>
</section>


@isset($similars[0])
	<section class="products row">
		<section class="content-header ">
			<h1>
				Compre
				<small>Também</small>
			</h1>
		</section>

		@foreach($similars as $similar)
		<div class="col-md-3">
			@include('products.components.card', array('product'=> $similar))
		</div>
		@endforeach

	</section>
@endisset



@endsection
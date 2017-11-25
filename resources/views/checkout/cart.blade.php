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


	@include('checkout.components.itemsTable', ['products' => $products])




<section class="content-header">
	<h1 style="font-size:50px" class="text-right">
		<small>Total</small>
		@empty($products)
		<a class="btn btn-info checkout pull-left" href="{{route('welcome')}}" role="button">Continuar comprando</a>
		@endempty @isset($products) {{ 'R$ '.number_format(($products->sum('Total')), 2, ',', '.') }}
		<a class="btn btn-warning btn-lg checkout pull-left" href="{{route('checkout')}}" role="button">Finalizar compra</a>
		@endisset
	</h1>

	<hr>
</section>





<section class="products row">

	<section class="content-header ">
		<h1>
			Compre
			<small>Também</small>
		</h1>
	</section>

	{{-- @foreach($products as $product)
	<div class="col-md-3">
		@include('products.components.card', array('product'=> $product))
	</div>
	@endforeach --}}

</section>



@endsection
@extends('layouts.store') @section('content')

<section class="cart row">

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

	<div class="form">

		@component('checkout.components.itemsTable') @endcomponent

	</div>


	<section class="content-header">
		<h1 class="text-right">
        	<small>Total</small>
			 R$ 100.00
		
            <a class="btn btn-success checkout pull-left" href="checkoutSucesso.jsp" role="button">Finalizar compra</a>
		</h1>
		
		<hr>
	</section>



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
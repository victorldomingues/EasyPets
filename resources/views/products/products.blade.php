@extends('layouts.store') @section('content')
<section class="row">


	<section class="content-header">
		<h1>
			Produtos
			<small>Todos os produtos</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{asset('')}}">
					<i class="fa fa-shopping-bag"></i> Página Inicial</a>
			</li>
			<li class="active">Produtos</li>
		</ol>
		<hr>
	</section>

</section>

<section class="row">

	<div class="col-md-12">
		@if(sizeof($products) > 0) @include('products.components.promotions', array('products'=> $products)) @endif
	</div>

</section>

<section class="row">
	@foreach($products as $product)
	<div class="col-md-3">
		@include('products.components.card', array('product'=> $product))
	</div>
	@endforeach

</section>
@endsection
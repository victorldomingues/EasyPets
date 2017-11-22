@extends('layouts.store') @section('content')
<section class="row">


	<section class="content-header">
		<h1>
			Serviços
			<small>Todos os serviços</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{asset('')}}">
					<i class="fa fa-shopping-bag"></i> Página Inicial</a>
			</li>
			<li class="active">Serviços</li>
		</ol>
		<hr>
	</section>

</section>

<section class="row">

	<div class="col-md-12">
		@include('products.components.promotions', ['products' => $services])
	</div>

</section>

<section class="row">


	@foreach($services as $product)
	<div class="col-md-3">
		@include('products.components.card', ['product' => $product])
	</div>

	@endforeach

</section>

@endsection
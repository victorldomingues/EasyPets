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
		@if(sizeof($services) > 0) @include('products.components.promotions', ['products' => $services]) @endif
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
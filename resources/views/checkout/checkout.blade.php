@extends('layouts.store') @section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Checkout
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{asset('')}}">
				<i class="fa fa-shopping-bag"></i> Página Inicial</a>
		</li>
		<li class="active">Checkout</li>
	</ol>
</section>

<div class="pad margin no-print">
	<div class="callout callout-info" style="margin-bottom: 0!important;">
		<h4>
			<i class="fa fa-info"></i> Parabéns:</h4>
		Muito obrigado pela preferncia: Clique em realizar pagamento.
	</div>
</div>


@include('checkout.components.userDataForm', ['products' => $products, 'order'=> $order])


<section class="products row">

	<section class="content-header">
		<h1>
			Compre
			<small>Também</small>
		</h1>
	</section>
	{{--
	<div class="item col-md-3 col-xs-6">
		@component('products.components.card') @endcomponent
	</div> --}}

</section>




@endsection
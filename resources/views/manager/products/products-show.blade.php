@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Produtos
		<small> {{$product->Name}} </small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.products')}}">
				Produtos </a>
		</li>

		<li class="active">
			{{$product->Name}}
		</li>

	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-5">

			<!-- Profile Image -->
			<div class="box box-primary">

				@isset($images)
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@foreach($images as $image)
						<li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration}}" @if($loop->iteration == 1) class="active" @endif ></li>
						@endforeach
					</ol>
					<div class="carousel-inner">
						@foreach($images as $image )
						<div class="item  @if($loop->iteration == 1)  active @endif">
							<img src="{{asset('')}}uploads/products/{{$image->ServerName}}">
						</div>
						@endforeach

					</div>
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="fa fa-angle-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="fa fa-angle-right"></span>
					</a>
				</div>
				@endisset
				<div class="box-body box-profile">


					<h3 class="profile-username text-center">{{$product->Name}}</h3>

					<hr>

					<p class="text-muted text-center">
						<b>Status: </b>
						@if( $product->Status == 1 )
						<i class="fa fa-circle text-success"></i> Ativo @else
						<i class="fa fa-circle text-danger"></i> Inativo @endif
					</p>

					<p class="text-muted text-center">

						<b> Fornecedor: </b>
						{{$product->ProviderName}}

					</p>

					<p class="text-muted text-center">

						<b> Categoria: </b>
						{{$product->CategoryName}}

					</p>

					<p class="text-muted text-center">

						<b> Modelo: </b> {{$product->ModelName}}

					</p>


					<p class="text-muted text-center">

						<b> Cor: </b> {{ $product->ColorName }}

					</p>
					<hr>
					<h3 class="text-muted text-center">

						<b> Preço: </b> {{ 'R$ '.number_format($product->UnitPrice, 2, ',', '.') }}

					</h3>
					<hr>

					<p class="text-muted text-center">{{$product->Description}}</p>

					<a href="{!! route('manager.products.edit', ['id'=>$product->Id])  !!}" class="btn btn-primary btn-block">
						<b>Editar</b>
					</a>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>


@endsection
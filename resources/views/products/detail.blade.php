@extends('layouts.store') @section('content')
<section class="row">


	<section class="content-header">
		<h1>
			{{$title}}
			<small>{{$description}}</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{asset('')}}">
					<i class="fa fa-shopping-bag"></i> Página Inicial</a>
			</li>
			<li class="active">{{$title}}</li>
		</ol>
		<hr>
	</section>

</section>

<section class="row">
	<div class="col-lg-6" style="margin-bottom:20px">
		@isset($images)
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				@foreach($images as $image)
				<li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration }}" class="@if($loop->iteration == 1) active @endif"></li>
				@endforeach
			</ol>
			<div class="carousel-inner">
				@foreach($images as $image)
				<div class="item @if($loop->iteration == 1) active @endif ">
					<img style="max-height:373px; min-height:373px; width:100%" src="@isset($image->ServerName){{asset('')}}uploads/products/{{$image->ServerName}}@endisset @empty($image->ServerName){{asset('')}}template/dist/img/default-product.jpg @endempty"
					 alt="First slide">
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
	</div>
	<div class="product-details col-lg-6">
            <div class="header">
              <ul class="price">
                <li class="current">R$ {{number_format($price, 2, ',', '.')}}</li>
              </ul>
              <div class="review d-flex align-items-center">
                <ul class="rate list-inline">
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                  <li class="list-inline-item"><i class="fa fa-star-o text-primary"></i></li>
                </ul><span class="text-muted">Sem Opinião</span>
              </div>
            </div>
            <p>{{$description}}</p>

           <a href="#" class="btn btn-lg btn-info cta-buy"> <i class="fa fa-shopping-cart"></i>Comprar</a>
            
          </div>
</section>
@endsection
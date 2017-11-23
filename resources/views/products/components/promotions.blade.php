<!-- START ACCORDION & CAROUSEL-->


<div class="row">

	<!-- /.col -->
	<div class="col-md-6" style="margin-bottom:20px">
		@isset($products)
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				@foreach($products as $product)
				<li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration }}" class="@if($loop->iteration == 1) active @endif"></li>
				@endforeach
			</ol>
			<div class="carousel-inner">
				@foreach($products as $product)
				<div class="item @if($loop->iteration == 1) active @endif ">
					<img style="max-height:373px; min-height:373px; width:100%" src="@isset($product->Image){{asset('')}}uploads/products/{{$product->Image}}@endisset @empty($product->Image){{asset('')}}template/dist/img/default-product.jpg @endempty"
					 alt="First slide">

					<div class="carousel-caption" style="background: rgba(0,0,0,0.7); border-radius: 3px">
						<h3>{{$product->Name}}
							<br>
							<small>
								<label class="label label-warning"> {{ 'R$ '.number_format($product->UnitPrice, 2, ',', '.') }}</label>
								<label style="cursor:pointer" class="label label-info  add-to-cart" product="{{$product->Id}}">
									<em class="fa fa-shopping-cart"></em> Comprar </label>
							</small>
						</h3>
					</div>
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
	@isset($products)
	<div class="col-md-3">

		@include('products.components.card', array('product' => $products[0] ))
	</div>

	@isset($products[1])
	<div class="col-md-3">
		@include('products.components.card', array('product' => $products[1] ) )
	</div>
	@endisset @endisset

</div>
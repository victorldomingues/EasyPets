<!-- START ACCORDION & CAROUSEL-->


<div class="row">

	<!-- /.col -->
	<div class="col-md-6">
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

					<div class="carousel-caption">
						<h3>{{$product->Name}}
							<h3>
								Comprar
								<button type="button" class="btn btn-small btn-info">
									<em class="fa fa-shopping-cart"></em>
								</button>
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
		@endisset
	@endisset

</div>
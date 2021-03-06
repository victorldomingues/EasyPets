<div class="product-single box box-solid">
	<!-- <div class="widget-user-header bg-black" style="
    background-image: url('@isset($product->Image){{asset('')}}uploads/products/{{$product->Image}}@endisset @empty($product->Image){{asset('')}}template/dist/img/default-product.jpg @endempty');">
	</div> -->
	<div class="widget-user-header"><img src="@isset($product->Image){{asset('')}}uploads/products/{{$product->Image}}@endisset @empty($product->Image){{asset('')}}template/dist/img/default-product.jpg @endempty"/></div>
	<div class="box-header with-border">
		<h3 class="box-title" style="padding-right:60px; height:40px"> {{$product->Name}} </h3>

		<div class="box-tools">
			<button class="btn btn-box-tool add-to-cart" product="{{$product->Id}}" type="button">
				<i class="fa fa-shopping-cart "></i> Comprar
			</button>
		</div>

	</div>
	<div class="box-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<li class="description">
				<a href="@isset($product->Image)/product/{{$product->Slug}}--p{{$product->Id}}@endisset" title="Saiba mais" >
					{{$product->Description}} 
				</a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-paint-brush "></i> {{$product->ColorName}} </a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-circle-o "></i> {{$product->CategoryName}}</a>
			</li>
			<li style="text-align: right" class=" add-to-cart" product="{{$product->Id}}">

				<a href="#">
					<b class="pull-left"> {{ 'R$ '.number_format($product->UnitPrice, 2, ',', '.') }}
					</b>

					<i class="fa fa-shopping-cart text-light-blue"></i> Comprar
				</a>
			</li>
		</ul>
	</div>
	<!-- /.box-body -->
</div>
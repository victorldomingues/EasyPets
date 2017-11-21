<div class="box box-solid">
	<div class="widget-user-header bg-black" style="
    background: url('@isset($product->Image){{asset('')}}uploads/products/{{$product->Image}}@endisset @empty($product->Image){{asset('')}}template/dist/img/default-product.jpg @endempty') center center; height:150px">
	</div>
	<div class="box-header with-border">
		<h3 class="box-title" style="padding-right:60px; height:40px"> {{$product->Name}} </h3>

		<div class="box-tools">
			<button class="btn btn-box-tool" type="button">
				<i class="fa fa-shopping-cart "></i> Comprar
			</button>
		</div>

	</div>
	<div class="box-body no-padding">
		<ul class="nav nav-pills nav-stacked">
			<li style="padding:10px; font-size: 10px; height: 40px">
				{{$product->Description}}
			</li>
			<li>
				<a href="#">
					<i class="fa fa-circle-o text-yellow"></i> {{$product->ColorName}} </a>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-circle-o text-red"></i> {{$product->CategoryName}}</a>
			</li>
			<li style="text-align: right">

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
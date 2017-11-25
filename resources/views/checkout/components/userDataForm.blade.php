<!-- Main content -->
<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<i class="fa fa-globe"></i> AdminLTE, Inc.
				<small class="pull-right">Date: 2/10/2014</small>
			</h2>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			From
			<address>
				<strong>Admin, Inc.</strong>
				<br> 795 Folsom Ave, Suite 600
				<br> San Francisco, CA 94107
				<br> Phone: (804) 123-5432
				<br> Email: info@almasaeedstudio.com
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			To
			<address>
				<strong>John Doe</strong>
				<br> 795 Folsom Ave, Suite 600
				<br> San Francisco, CA 94107
				<br> Phone: (555) 539-1037
				<br> Email: john.doe@example.com
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<b>Invoice #{{$order->Id}}</b>
			<br>
			<br>
			<b>Compra ID:</b> {{$order->Id}}
			<br>
			<b>Payment Due:</b> 2/22/2014
			<br>
			<b>Account:</b> 968-34567
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- Table row -->
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Descrição</th>
						<th>Quantidade</th>
						<th>Preço unitário</th>
						<th>Subtotal</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td> # {{$product->ProductId}}</td>
						<td> {{$product->Name}}</td>
						<td> {{$product->Quantity}} </td>
						<td> {{ 'R$ '.number_format($product->UnitPrice, 2, ',', '.') }} </td>
						<th>{{ 'R$ '.number_format(($product->UnitPrice * $product->Quantity), 2, ',', '.') }}</th>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<div class="row">
		<!-- accepted payments column -->
		<div class="col-xs-6">
			<p class="lead">Payment Methods:</p>
			<img src="{{asset('')}}template/dist/img/credit/visa.png" alt="Visa">
			<img src="{{asset('')}}template/dist/img/credit/mastercard.png" alt="Mastercard">
			<img src="{{asset('')}}template/dist/img/credit/american-express.png" alt="American Express">
			<img src="{{asset('')}}template/dist/img/credit/paypal2.png" alt="Paypal">

			<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
				Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity
				jajah plickers sifteo edmodo ifttt zimbra.
			</p>
		</div>
		<!-- /.col -->
		<div class="col-xs-6">
			<p class="lead">Amount Due 2/22/2014</p>

			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Subtotal:</th>
						<td> {{ 'R$ '.number_format($order->Total, 2, ',', '.') }}</td>
					</tr>
					<tr>
						<th>Desconto</th>
						<td> {{ 'R$ '.number_format($order->Discount, 2, ',', '.') }}</td>
					</tr>
					<tr>
						<th>Total:</th>
						<td>
							@isset($products) {{ 'R$ '.number_format($order->Total, 2, ',', '.') }} @endisset
						</td>
					</tr>
				</table>
			</div>
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->

	<!-- this row will not appear when printing -->
	<div class="row no-print">
		<div class="col-xs-12">
			<a href="invoice-print.html" target="_blank" class="btn btn-default">
				<i class="fa fa-print"></i> Imprimir</a>
			<button type="button" class="btn btn-success pull-right">
				<i class="fa fa-credit-card"></i> Submit Payment
			</button>
			<button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
				<i class="fa fa-download"></i> Generate PDF
			</button>
		</div>
	</div>
</section>
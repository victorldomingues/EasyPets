<!-- Main content -->
<section class="invoice">
	<!-- title row -->
	<div class="row">
		<div class="col-xs-12">
			<h2 class="page-header">
				<em class="fa fa-shopping-bag"> </em>
				<b> Easy</b>Pets
				<small class="pull-right">Data: {{date('d/m/Y')}}</small>
			</h2>
		</div>
		<!-- /.col -->
	</div>
	<!-- info row -->
	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			De
			<address>
				<strong>EasyPets.</strong>
				<br> R. Casa do Ator, 275 - Vila Olimpia,
				<br> São Paulo - SP, 04546-001.
				<br> Telefone: (804) 123-5432
				<br> E-mail: contato@easypets.com.br
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			Para
			<address>
				<strong>{{$customer->Name}}</strong>
				@isset($customer->PublicPlace)
				<br> {{$customer->PublicPlace}} , {{$customer->Number}}
				<br> {{$customer->City}}, {{$customer->State}} - {{$customer->Country}} - {{$customer->ZipCode}}
				<br> E-mail: {{$customer->Email}}
				<br>
				<label style="cursor:pointer" data-target="#modal-address" data-toggle="modal" class="label label-info"> Alterar meus dados </label>
				@endisset {{--
				<br> Telefone: (555) 539-1037 --}} @empty($customer->PublicPlace)
				<br> E-mail: {{$customer->Email}}
				<br> Você precisa informar o endereço
				<br>
				<label style="cursor:pointer" data-target="#modal-address" data-toggle="modal" class="label label-info"> Informar </label>
				@endempty
			</address>
		</div>
		<!-- /.col -->
		<div class="col-sm-4 invoice-col">
			<b>Invoice #{{$order->Id}}</b>
			<br>
			<br>
			<b>Compra ID:</b> {{$order->Id}}
			<br>
			<b>Pagamento em :</b> {{date('d/m/Y')}}
			<br>
			<b>Conta:</b> {{$customer->Id}}
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
			<p class="lead">Formas de pagamento:</p>
			<img src="{{asset('')}}template/dist/img/credit/visa.png" alt="Visa">
			<img src="{{asset('')}}template/dist/img/credit/mastercard.png" alt="Mastercard">
			<img src="{{asset('')}}template/dist/img/credit/american-express.png" alt="American Express">
			<img src="{{asset('')}}template/dist/img/credit/paypal2.png" alt="Paypal">

			<div class="form-group">
				<p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
					<label for="">Inserir cupom de desconto</label>
					<div class="input-group">
						<div class="input-group-btn">
							<span class="btn btn-default">
								<i class="fa fa-ticket"></i>
							</span>
						</div>
						<input class="form-control" type="text" name="discountcode" placeholder="CÓDIGO DE DESCONTO">
					</div>
				</p>
			</div>

		</div>
		<!-- /.col -->
		<div class="col-xs-6">
			<p class="lead">Valores a pagar {{date('d/m/Y')}}</p>

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
			{{--
			<button type="button" class="btn btn-success pull-right">
				<i class="fa fa-credit-card"></i> Realizar pagamento
			</button> --}}
			<div id="paypal-button" class="pull-right"></div>

			<button type="button" class="btn btn-danger pull-right" style="margin-right: 5px;">
				<i class="fa fa-trash-o"></i> Cancelar
			</button>
		</div>
	</div>
</section>

<div class="modal modal-default fade" id="modal-address">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="POST" action="{!! route('manager.customers.update', ['id'=>$customer->Id])  !!}">
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">{{$customer->Name}}</h4>
				</div>
				<div class="modal-body">
					@include('manager.customers.customers-form')
					<input type="hidden" name="backto" value="checkout" />
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-danger  pull-left" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-info">Salvar</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@section('scripts')

<script>
	paypal.Button.render({

            env: 'sandbox', // sandbox | production

            // PayPal Client IDs - replace with your own
            // Create a PayPal app: https://developer.paypal.com/developer/applications/create
            client: {
                sandbox:    'AZDxjDScFpQtjWTOUtWKbyN_bDt4OgqaF4eYXlewfBP4-8aqX3PiV8e1GWU6liB2CUXlkA59kJXE7M6R',
                production: '<insert production client id>'
            },

			  style: {
					label: 'checkout',
					size:  'small',    // small | medium | large | responsive
					shape: 'pill',     // pill | rect
					color: 'blue'      // gold | blue | silver | black
				},

            // Show the buyer a 'Pay Now' button in the checkout flow
            commit: true,

            // payment() is called when the button is clicked
            payment: function(data, actions) {

                // Make a call to the REST api to create the payment
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: { total: '{{$order->Total}}', currency: 'BRL' }
                            }
                        ]
                    }
                });
            },

            // onAuthorize() is called when the buyer approves the payment
            onAuthorize: function(data, actions) {

                // Make a call to the REST api to execute the payment
                return actions.payment.execute().then(function() {
					var token = $("body input[name='_token'").val();
					$.post(
						"/order/pay",
						{
							_token: token
						},
						function(data) {
						  window.alert('Pagamento efetuado!');
						  window.location.href = "{{route('home')}}";
						}
					);
                });
            }

        }, '#paypal-button');

</script>
@endsection
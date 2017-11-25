@isset($products)
<div class="panel">

	<div class="box">
		<div class="box-header with-border">
			<div class="box-title"> Itens da compra</div>
		</div>

		<div class="box-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th> # Código</th>
						<th> Descrição </th>
						<th> Quantidade </th>
						<th> Preço Unitário </th>
						<th> Subtotal </th>
						<th></th>
					</tr>
				</thead>
				<tbody id="cart-list">
					@foreach($products as $product)
					<tr>
						<td> # {{$product->ProductId}}</td>
						<td> {{$product->Name}}</td>
						<td> {{$product->Quantity}} </td>
						<td> {{ 'R$ '.number_format($product->UnitPrice, 2, ',', '.') }} </td>
						<th>{{ 'R$ '.number_format(($product->UnitPrice * $product->Quantity), 2, ',', '.') }}</th>
						<td class="text-center">
							<em class="fa fa-trash"></em>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endisset
@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Clientes
		<small>Clientes da loja</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.customers')}}">
				Clientes </a>
		</li>
		<li class="active">Novo cliente</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cadastro de cliente</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" @isset($customer) action="{!! route('manager.customers.update', ['id'=>$customer->Id])  !!}"
				 @endisset @empty($customer) action="{{route('manager.customers.store')}}" @endempty>


					<div class="box-body">

						{{ csrf_field() }}


						<div class="form-group">
							<label for="">Nome</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Name}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" id="email" name="email" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Email}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">CPF</label>
							<input type="text" class="form-control" id="cpf" name="cpf" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Cpfe}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">Data de Nascimento</label>
							<input type="date" class="form-control" id="birthday" name="birthday" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Birthday}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">Logradouro</label>
							<input type="text" class="form-control" id="publicplace" name="publicplace" placeholder="(Obrigatório)" @isset($customer)
							 value="{{$customer->PublicPlace}}" @endisset required>
						</div>

						<div class="form-group">
							<label for="">Número</label>
							<input type="text" class="form-control" id="number" name="number" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Number}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">Complemento</label>
							<input type="text" class="form-control" id="complement" name="complement" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Complement}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">CEP</label>
							<input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->ZipCode}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">Bairro</label>
							<input type="text" class="form-control" id="neighborhood" name="neighborhood" placeholder="(Obrigatório)" @isset($customer)
							 value="{{$customer->Neighborhood}}" @endisset required>
						</div>

						<div class="form-group">
							<label for="">Cidade</label>
							<input type="text" class="form-control" id="city" name="city" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->City}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">Estado</label>
							<input type="text" class="form-control" id="state" name="state" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->State}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="">País</label>
							<input type="text" class="form-control" id="coutry" name="country" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->Country}}"
							 @endisset required>
						</div>

						{{--
						<div class="form-group">
							<label for="">Latitude</label>
							<input type="text" class="form-control" id="lat" name="lat" placeholder="(Opcional)" @isset($customer) value="{{$customer->Lat}}"
							 @endisset>
						</div>

						<div class="form-group">
							<label for="">Longitude</label>
							<input type="text" class="form-control" id="long" name="long" placeholder="(Opcional)" @isset($customer) value="{{$customer->Long}}"
							 @endisset>
						</div> --}}

						<!-- <div class="form-group">						
							<label for="">Forma de Pagamento</label>
							<input type="text" class="form-control" id="paymentpreference" name="paymentpreference" placeholder="(Obrigatório)" @isset($customer) value="{{$customer->PaymentPreference}}"
							 @endisset required>
						</div> -->

					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>
						@isset($customer)
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"> Remover </button>
						@endisset
					</div>

				</form>
			</div>

		</div>
	</div>
	<!-- /.row -->
</section>
@isset($customer)
<div class="modal modal-danger fade" id="modal-danger">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="POST" action="{!! route('manager.customers.destroy', ['id'=>$customer->Id])  !!}">
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Atenção !!!</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente remover o cliente " {{ $customer->Name }} "</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-outline">Remover</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endisset @endsection
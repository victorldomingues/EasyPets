@extends('layouts.store') @section('content')
<section class="row">
	<section class="content-header">
		<h1>
			Adoção
			<small>Ficha cadastral</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{asset('')}}">
					<i class="fa fa-shopping-bag"></i> Página Inicial</a>
			</li>
			<li class="active">Adoção</li>
		</ol>
		<hr>
	</section>

</section>
<section class="row">
	@if(!isset(Auth::user()->id)) @include('adoption.components.registration-alert') @else
	<div class="pad margin no-print">
		<div class="callout callout-info" style="margin-bottom: 0!important;">
			<h4>
				<i class="fa fa-heart"></i> Parabéns:


			</h4>
			<h2>
				Você está muito perto de adotar
				<i class="fa fa-heart"></i> "{{$pet->Name}}"</h2>
			<br> Preencha os dados do formulário
		</div>
	</div>
	@endif
</section>

<section class="row">

	<div class="col-md-4">
		@isset($pet) @include('adoption.components.pets-card', ['carousel'=> true]) @endisset
	</div>
	<div class="col-md-8">
		<!-- general form elements -->
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Dados para a adoção</h3>
			</div>


			@if(isset(Auth::user()->id))

			<form role="form" method="POST"  action="{!! route('adoption.store',['id'=>$pet->Id])  !!}">


				<div class="box-body">
					@if(isset($customer->PublicPlace)) {{ csrf_field() }}

					<div class="col-md-4">

						<div class="form-group">
							Informações do candidato
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

					</div>

					<div class="col-md-8">


						<div class="form-group">
							<label for="">Atividade principal</label>
							<input type="text" class="form-control" id="mainactivity" name="mainactivity" placeholder="(Obrigatório)" required>
						</div>

						<div class="form-group">
							<label for="">Quem vai sustentar o animal adotado:
								<small style="font-weight: normal;"> descreva brevemente</small>
							</label>
							<input type="text" class="form-control" id="whowillsupport" name="whowillsupport" placeholder="(Obrigatório)" required>
						</div>

						<div class="form-group">
							<label for="">Adultos na casa?
								<small style="font-weight: normal;"> descreva brevemente</small>
							</label>
							<input type="text" class="form-control" id="adultsinthehouse" name="adultsinthehouse" placeholder="(Obrigatório)" required>
						</div>

						<div class="form-group">
							<label for="">Aceitam animais?</label>
							<br>
							<label>
								<input type="radio" name="allowpets" class="flat-red" value="1" @empty($pet) checked @endempty @isset($pet) @if($pet->Status == 1) checked @endif @endisset > Sim
							</label>
							<label>
								<input type="radio" name="allowpets" class="flat-red" value="0" @isset($pet) @if($pet->Status == 0) checked @endif @endisset > Não
							</label>
						</div>


					</div>

				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Enviar requerimento</button>
				</div>

				@else Estamos quase lá, precisamos dos seus dados para prosseguir
				<br>
				<label style="cursor:pointer" data-target="#modal-address" data-toggle="modal" class="label label-info"> Informar </label>
				@endif

			</form>

			@else @include('adoption.components.registration-alert') @endif


		</div>
	</div>
</section>
@isset($customer)
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
				<input type="hidden" name="backto" value="adoption.form">
				<input type="hidden" name="id" value="{{$pet->Id}}">
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

@endisset

@endsection @section('scripts')
<!-- Page script -->
<script>
	$(function () {

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red pet scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red pet scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

  })

</script>

@endsection
@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Adoção
		<small>Adoções </small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.adoptions')}}">
				Adoções </a>
		</li>
		<li class="active">Adoção</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-8">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Adoção</h3>
				</div>

				<form method="POST" action="{!! route('manager.adoptions.update', ['id'=>$adoption->Id])  !!}">


					<div class="box-body">

						<div class="col-md-6">


							{{ csrf_field() }}


							<div class="form-group">
								<label for="">Atividade principal</label>
								<input type="text" class="form-control" id="mainactivity" name="mainactivity" placeholder="(Obrigatório)" value="{{$adoption->MainActivity}}"
								 disabled required>
							</div>

							<div class="form-group">
								<label for="">Quem vai sustentar o animal adotado:
									<small style="font-weight: normal;"> descreva brevemente</small>
								</label>
								<input type="text" class="form-control" id="whowillsupport" name="whowillsupport" placeholder="(Obrigatório)" value="{{$adoption->WhoWillSupport}}"
								 disabled required>
							</div>

							<div class="form-group">
								<label for="">Adultos na casa?
									<small style="font-weight: normal;"> descreva brevemente</small>
								</label>
								<input type="text" class="form-control" id="adultsinthehouse" name="adultsinthehouse" placeholder="(Obrigatório)" value="{{$adoption->AdultsInTheHouse}}"
								 disabled required>
							</div>

							<div class="form-group">
								<label for="">Aceitam animais?</label>
								<br>
								<label>
									<input disabled type="radio" name="allowpets" class="flat-red" value="1" @empty($adoption) checked @endempty @isset($adoption)
									 @if($adoption->AllowPets == 1) checked @endif @endisset > Sim
								</label>
								<label>
									<input disabled type="radio" name="allowpets" class="flat-red" value="0" @isset($adoption) @if($adoption->AllowPets == 0) checked @endif @endisset > Não
								</label>
							</div>

							<div class="form-group">
								<label for="">Situação</label>
								<select class="form-control select2" id="status" name="status" style="width: 100%;" @isset($adoption) value="{{$adoption->Status}}"
								 @endisset required>
									<option value="1" @empty($adoption) selected="selected" @endempty @isset($adoption) @if($adoption->Status == 1) selected="selected" @endif @endisset>Pendente</option>
									<option value="2" @isset($adoption) @if($adoption->Status == 2) selected="selected" @endif @endisset > Aprovado</option>
									<option value="0" @isset($adoption) @if($adoption->Status == 0) selected="selected" @endif @endisset > Reprovado</option>
								</select>
							</div>

						</div>
						<div class="col-md-6">

							<div class="form-group">
								Informações do candidato
								<address>
									<strong>{{$customer->Name}}</strong>
									@isset($customer->PublicPlace)
									<br> {{$customer->PublicPlace}} , {{$customer->Number}}
									<br> {{$customer->City}}, {{$customer->State}} - {{$customer->Country}} - {{$customer->ZipCode}}
									<br> E-mail: {{$customer->Email}}
									<br> @endisset
								</address>
							</div>


						</div>



					</div>

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>

						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"> Remover </button>

					</div>
				</form>

			</div>

		</div>
	</div>
	<!-- /.row -->
</section>

<div class="modal modal-danger fade" id="modal-danger">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="POST" action="{!! route('manager.adoptions.destroy', ['id'=>$adoption->Id])  !!}">
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Atenção !!!</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente remover o requerimento de adoção do animal " {{ $adoption->PetName }} "</p>
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


@endsection @section('scripts')
<!-- Page script -->
<script>
	$(function () {
    
    $('.select2').select2();


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red provider scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red provider scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })


   
  })

</script>

@endsection
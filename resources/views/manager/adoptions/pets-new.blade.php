@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Cadastro de Pet
		<small>Cadastro de animal</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.categories')}}">
				Pets
			</a>
		</li>
		<li class="active">Novo Pet</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cadastro de pet</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" @isset($pet) action="{!! route('manager.pets.update',['id'=>$pet->Id])  !!}" @endisset @empty($pet)
				 action="{{route('manager.pets.store')}}" @endempty>
					{{ csrf_field() }}
					<div class="box-body">
						Informações do pet


						<div class="row">
							<div class="col-md-4">
								<br>

								<div class="form-group">
									<label for="">Nova imagem</label>
									<input type="file" id="file" name="file">

									<p class="help-block">clique para adicionar uma nova imagem</p>
								</div>

								<div class="form-group">
									<label for="">Imagens</label>

									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
											{{--
											<li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
											<li data-target="#carousel-example-generic" data-slide-to="2" class=""></li> --}}
										</ol>
										<div class="carousel-inner">
											<div class="item active">
												<img src="{{asset('')}}template/dist/img/photo1.png" alt="First slide">

												<div class="carousel-caption">
													<button type="button" class="btn btn-small btn-danger">
														<em class="fa fa-trash-o"></em>
													</button>
												</div>
											</div>

										</div>
										<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
											<span class="fa fa-angle-left"></span>
										</a>
										<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
											<span class="fa fa-angle-right"></span>
										</a>
									</div>

								</div>

							</div>



							<div class="col-md-8">

								<div class="form-group">
									<br>
									<label for="">Nome</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)" @isset($pet) value="{{$pet->Name}}"
									 @endisset required>
								</div>

								<div class="form-group">
									<label for="">Raça</label>
									<input type="text" class="form-control" id="race" name="race" placeholder="(Opcional)" @isset($pet) value="{{$pet->Race}}"
									 @endisset required>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="">Idade</label>
											<input type="text" class="form-control" id="age" name="age" placeholder="(Opcional)" @isset($pet) value="{{$pet->Age}}" @endisset
											 required>
										</div>
									</div>

									<div class="col-md-6">
										<div class="form-group">
											<label>Tipo</label>
											<select class="form-control select2" style="width: 100%;" tabindex="-1" aria-hidden="true" name="type">
												<option value="0" selected="selected">Cão</option>
												<option value="1">Gato</option>
											</select>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>
										<input type="radio" name="status" class="flat-red" value="1" @empty($pet) checked @endempty @isset($pet) @if($pet->Status == 1) checked @endif @endisset > Ativo
									</label>
									<label>
										<input type="radio" name="status" class="flat-red" value="0" @isset($pet) @if($pet->Status == 0) checked @endif @endisset > Inativo
									</label>
								</div>

							</div>

						</div>

						{{--
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Descrição</label>
									<input type="text" class="form-control" id="description" name="description" placeholder="(Opcional)" @isset($pet) value="{{$pet->Name}}"> @endisset required>
								</div>


							</div>
						</div> --}} {{--
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Endereco</label>
									<input type="text" class="form-control" id="adress" name="address" placeholder="(Opcional)">
								</div>

								<div class="form-group">
									<label for="">Cidade</label>
									<input type="text" class="form-control" id="city" name="city" placeholder="(Opcional)">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Bairro</label>
									<input type="text" class="form-control" id="race" name="race" placeholder="(Opcional)">
								</div>

								<div class="form-group">
									<label for="">Estado</label>
									<input type="text" class="form-control" id="district" name="district" placeholder="(Opcional)">
								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Numero</label>
									<input type="text" class="form-control" id="number" name="number" placeholder="(Opcional)">
								</div>
							</div>
						</div> --}}




						<!-- radio -->




						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Salvar</button>
							@isset($pet)
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"> Remover </button>
							@endisset
						</div>

				</form>
				</div>
				<!-- /.box -->

			</div>
		</div>
		<!-- /.row -->
</section>

@isset($pet)
<div class="modal modal-danger fade" id="modal-danger">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="POST" action="{!! route('manager.pets.destroy', ['id'=>$pet->Id])  !!}">
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Atenção !!!</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente remover a cor " {{ $pet->Name }} "</p>
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


@endisset @endsection @section('scripts')
<!-- Page script -->
<script>
	$(function () {
    
$('.select2').select2();

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
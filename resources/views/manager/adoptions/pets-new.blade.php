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
				<form role="form" action="{{route('manager.pets.store')}}" method="POST">
					{{ csrf_field() }}
					<div class="box-body">
						Informações do pet

						<div class="form-group">
							<div class="row">
								<div class="col-md-4">
									<br>
									<div>
										<img src="http://placehold.it/150x100" alt="Pet image" class="margin">
									</div>

									<div class="form-group">
										<label for="InputFile">Upload</label>
										<input id="InputFile" type="file">

										<p class="help-block">Insira aqui a foto do Pet</p>
									</div>



								</div>



								<div class="col-md-8">

									<div class="form-group">
										<br>
										<label for="name">Nome</label>
										<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)">
									</div>

									<div class="form-group">
										<label for="name">Raça</label>
										<input type="text" class="form-control" id="race" name="race" placeholder="(Opcional)">
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="name">Idade</label>
												<input type="text" class="form-control" id="age" name="age" placeholder="(Opcional)">
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Tipo</label>
												<select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
													<option selected="selected">Grande</option>
													<option>Médio</option>
													<option>Pequeno</option>
												</select>
											</div>
										</div>
									</div>

								</div>

							</div>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="name">Descrição</label>
										<input type="text" class="form-control" id="description" name="description" placeholder="(Opcional)">
									</div>


								</div>
							</div>





							{{--  <div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="name">Endereco</label>
										<input type="text" class="form-control" id="adress" name="address" placeholder="(Opcional)">
									</div>

									<div class="form-group">
										<label for="name">Cidade</label>
										<input type="text" class="form-control" id="city" name="city" placeholder="(Opcional)">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="name">Bairro</label>
										<input type="text" class="form-control" id="race" name="race" placeholder="(Opcional)">
									</div>

									<div class="form-group">
										<label for="name">Estado</label>
										<input type="text" class="form-control" id="district" name="district" placeholder="(Opcional)">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="name">Numero</label>
										<input type="text" class="form-control" id="number" name="number" placeholder="(Opcional)">
									</div>
								</div>
							</div>  --}}





							<div class="checkbox">
								<label>
									<input type="checkbox" id="isDeleted" name="isDeleted"> Inativa
								</label>
							</div>


						</div>
						<!-- /.box-body -->

						<div class="box-footer">
							<button type="submit" class="btn btn-primary">Salvar</button>
						</div>

					</div>

				</form>
			</div>
			<!-- /.box -->

		</div>
	</div>
	<!-- /.row -->
</section>
@endsection
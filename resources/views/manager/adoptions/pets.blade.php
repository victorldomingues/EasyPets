@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Pets
		<small>Animais para adoção</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li class="active">Pets</li>
	</ol>
</section>
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Pets cadastrados </h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<a href="{{route('manager.pets.new')}}" type="button" class="btn bg-olive btn-sm" data-toggle="tooltip" title="Cadastrar novo pet">
							<i class="fa fa-plus"></i> Novo
						</a>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Pet</th>
								<th style="width:115px">Ações</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($pets as $pet)
							<tr>
								<td>
									<img class="direct-chat-img" style="max-width: 25px; max-height: 25px; margin-right: 10px;" 
									@isset($pet->Image) 
									src="{{asset('')}}uploads/pets/{{$pet->Image}}" 
									@endisset 
									@empty($pet->Image) 
									@if($pet->Type  == 0)
									src="{{asset('')}}template/dist/img/default-dog.jpg"
									@else
									src="{{asset('')}}template/dist/img/default-cat.jpg"
									@endif
									@endempty > 
									{{ $pet->Name }}
								</td>
								<td>
									<div class="btn-group">
										<a href="{!! route('manager.pets.show', ['id'=>$pet->Id])  !!}" class="btn btn-sm btn-default">Visualizar</a>
										<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="{!! route('manager.pets.show', ['id'=>$pet->Id])  !!}">Visualizar</a>
											</li>
											<li>
												<a href="{!! route('manager.pets.edit', ['id'=>$pet->Id])  !!}">Editar</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="{!! route('manager.pets.destroy', ['id'=>$pet->Id])  !!}">Excluir</a>
											</li>

										</ul>
									</div>
								</td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th>Pet</th>
								<th>Ações</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>

		</div>
	</div>
	<!-- /.row -->
</section>


@endsection
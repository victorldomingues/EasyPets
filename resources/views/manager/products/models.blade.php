@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Modelos
		<small>Modelos para produto</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li class="active">Modelos</li>
	</ol>
</section>
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Modelos de produto cadastrados </h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<a href="{{route('manager.models.new')}}" type="button" class="btn bg-olive btn-sm" data-toggle="tooltip" title="Cadastrar novo modelo">
							<i class="fa fa-plus"></i> Novo
						</a>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Modelo</th>
								<th style="width:115px">Ações</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($models as $model)
							<tr>
								<td> {{ $model->Name }} </td>
								<td>
									<div class="btn-group">
										<a href="{!! route('manager.models.show', ['id'=>$model->Id])  !!}" class="btn btn-sm btn-default">Visualizar</a>
										<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="{!! route('manager.models.show', ['id'=>$model->Id])  !!}">Visualizar</a>
											</li>
											<li>
												<a href="{!! route('manager.models.edit', ['id'=>$model->Id])  !!}">Editar</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="{!! route('manager.models.destroy', ['id'=>$model->Id])  !!}">Excluir</a>
											</li>

										</ul>
									</div>
								</td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th>Modelo</th>
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
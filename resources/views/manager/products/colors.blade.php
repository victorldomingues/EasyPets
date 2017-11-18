@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Cores
		<small>Cores para produto</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li class="active">Cores</li>
	</ol>
</section>
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Cores de produto cadastradas </h3>
					<!-- tools box -->
					<div class="pull-right box-tools">
						<a href="{{route('manager.colors.new')}}" type="button" class="btn bg-olive btn-sm" data-toggle="tooltip" title="Cadastrar nova cor">
							<i class="fa fa-plus"></i> Novo
						</a>
					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Cor</th>
								<th style="width:115px">Ações</th>
							</tr>
						</thead>
						<tbody>

							@foreach ($colors as $color)
							<tr>
								<td> {{ $color->Name }} </td>
								<td>
									<div class="btn-group">
										<a href="{!! route('manager.colors.show', ['id'=>$color->Id])  !!}" class="btn btn-sm btn-default">Visualizar</a>
										<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="{!! route('manager.colors.show', ['id'=>$color->Id])  !!}">Visualizar</a>
											</li>
											<li>
												<a href="{!! route('manager.colors.edit', ['id'=>$color->Id])  !!}">Editar</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="#">Excluir</a>
											</li>

										</ul>
									</div>
								</td>
							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th>Cor</th>
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
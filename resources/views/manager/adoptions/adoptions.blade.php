@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Adoções
		<small>Animais adotados, em processo de adoção ou em espera para adoção</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li class="active">Adoções</li>
	</ol>
</section>
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Adoções cadastradas </h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Adoção</th>
								<th>Animal</th>
								<th>Solicitante</th>
								<th>Status</th>
								@if(Auth::user()->Type == 0)
								<th>Ações</th> @endif
							</tr>
						</thead>
						<tbody>

							@foreach ($adoptions as $adoption)
							<tr>
								<td>
									{{ $adoption->Id }}
								</td>
								<td>
									{{ $adoption->PetName }}
								</td>
								<td>
									{{ $adoption->CustomerName }}
								</td>
								<td>
									@if($adoption->Status == \App\Helpers\AdoptionsStateHelper::open) Aberto @elseif($adoption->Status == \App\Helpers\AdoptionsStateHelper::canceled)
									Cancelado @else Adotado @endif
								</td>
								@if(Auth::user()->Type == 0)

								<td>
									<div class="btn-group">
										<a href="{!! route('manager.adoptions.edit', ['id'=>$adoption->Id])  !!}" class="btn btn-sm btn-default">Editar</a>
										<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown">
											<span class="caret"></span>
											<span class="sr-only">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="{!! route('manager.adoptions.edit', ['id'=>$adoption->Id])  !!}">Editar</a>
											</li>
											<li class="divider"></li>
											<li>
												<a href="{!! route('manager.adoptions.destroy', ['id'=>$adoption->Id])  !!}">Excluir</a>
											</li>

										</ul>
									</div>
								</td>

								@endif

							</tr>
							@endforeach

						</tbody>
						<tfoot>
							<tr>
								<th>Adoção</th>
								<th>Animal</th>
								<th>Solicitante</th>
								<th>Status</th>
								@if(Auth::user()->Type == 0)
								<th>Ações</th> @endif

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
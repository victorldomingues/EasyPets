@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">


	<h1>

		Funcionários
		<small> {{$manager->Name}} </small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.employees')}}">
				Funcionários </a>
		</li>

		<li class="active">
			{{$manager->Name}}
		</li>

	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-5">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">


					<h3 class="profile-username text-center">{{$manager->Name}}</h3>

					<p class="text-muted text-center">
						<b>Função: </b>

						@if( $manager->Role == 0 ) 
						Gerente						 
						@endif

						@if( $manager->Role == 1 ) 
						Administrador						 
						@endif
						
					</p>

					<p class="text-muted text-center">

						@if($manager->Role == 1 || $manager->Role == 1)
							<i class="fa fa-circle text-success"></i> 
							Habilitado para alterações no sistema 
						@else
							<i class="fa fa-circle text-danger"></i> 
							Inabilitado para alterações no sistema 
						@endif

					</p>



					<a href="{!! route('manager.employees.edit', ['id'=>$manager->Id])  !!}" class="btn btn-primary btn-block">
						<b>Editar</b>
					</a>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
</section>


@endsection
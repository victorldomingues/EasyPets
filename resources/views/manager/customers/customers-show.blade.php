@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">


	<h1>

		Clientes
		<small> {{$customer->Name}} </small>
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

		<li class="active">
			{{$customer->Name}}
		</li>

	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-5">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">

		
					<h3 class="profile-username text-center">{{$customer->Name}}</h3>

				

					<p class="text-muted text-center">

						<b> Nome: </b>
						{{$customer->Name}}

					</p>
			
					<a href="{!! route('manager.customers.edit', ['id'=>$customer->Id])  !!}" class="btn btn-primary btn-block">
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
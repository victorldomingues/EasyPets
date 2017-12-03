@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Visão Geral
		<small>Minha conta</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<!-- <li class="active">Dashboard</li> -->
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{$dashboard->Orders}}
						<small>/ {{$dashboard->AllOrders}}</small>
					</h3>

					<p>Novas ordens</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="{{route('manager.orders')}}" class="small-box-footer">Mais informações
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
				
					<h3>
					@if($dashboard->AllOrders  != 0)
						{{$dashboard->Orders * 100 / $dashboard->AllOrders }}
						@else
						0
						@endif
						<sup style="font-size: 20px">%</sup>
					</h3>

					<p>Taxa de conversão</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a class="small-box-footer">Mais informações
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{$dashboard->Customers}}</h3>

					<p>Clientes registrados</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="{{route('manager.customers')}}" class="small-box-footer">Mais informações
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{$dashboard->Adoptions}}</h3>

					<p>Adoções</p>
				</div>
				<div class="icon">
					<i class="fa fa-paw"></i>
				</div>
				<a href="{{route('manager.adoptions')}}" class="small-box-footer">Mais informações
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row -->


</section>
<!-- /.content -->
@endsection
@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Pets
		<small> {{$pet->Name}} </small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.pets')}}">
				Pets </a>
		</li>

		<li class="active">
			{{$pet->Name}}
		</li>

	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-5">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">


					<h3 class="profile-username text-center">{{$pet->Name}}</h3>


					@if(count($images) > 0)
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							@foreach($images as $image)
							<li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration}}" @if($loop->iteration == 1) class="active" @endif ></li>
							@endforeach
						</ol>
						<div class="carousel-inner">
							@foreach($images as $image)
							<div class="item  @if($loop->iteration == 1)  active @endif">
								<img  style="width:100%;" src="{{asset('')}}uploads/pets/{{$image->ServerName}}">
							</div>
							@endforeach

						</div>
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="fa fa-angle-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="fa fa-angle-right"></span>
						</a>
					</div>
					@else 
					
							<img  style="width:100%;"
							@if($pet->Type  == 0)
							src="{{asset('')}}template/dist/img/default-dog.jpg"
							@else
							src="{{asset('')}}template/dist/img/default-cat.jpg"
							@endif
							>
					@endif

					<p class="text-muted text-center">
						<b>Status: </b>
						@if( $pet->Status == 1 )
						<i class="fa fa-circle text-success"></i> Ativo @else
						<i class="fa fa-circle text-danger"></i> Inativo @endif
					</p>

					<p class="text-muted text-center">
						@if($pet->Type==0) Cão @else Gato @endif
					</p>

					<a href="{!! route('manager.pets.edit', ['id'=>$pet->Id])  !!}" class="btn btn-primary btn-block">
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
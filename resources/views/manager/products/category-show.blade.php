@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Categorias
		<small> {{$category->Name}} </small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.categories')}}">
				Categorias </a>
		</li>

		<li class="active">
			{{$category->Name}}
		</li>

	</ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-md-5">

			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					

					<h3 class="profile-username text-center">{{$category->Name}}</h3>

                    	<p class="text-muted text-center"> 
                        <b>Status: </b>
                            @if( $category->Status == 1 )
                             <i class="fa fa-circle text-success"></i>   Ativa
                            @else
                                <i class="fa fa-circle text-danger"></i>   Inativa
                            @endif
                        </p>

					<p class="text-muted text-center">{{$category->Description}}</p>

					<a href="{!! route('manager.categories.edit', ['id'=>$category->Id])  !!}" class="btn btn-primary btn-block">
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
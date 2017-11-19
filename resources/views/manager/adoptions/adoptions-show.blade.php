@extends('layouts.app') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Adoções
		<small> {{$pet->Name}} </small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.adoptions')}}">
				Adoções </a>
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

                    	<p class="text-muted text-center"> 
                        <b>Status: </b>
                            @if( $pet->Status == 1 )
                             <i class="fa fa-circle text-success"></i>   Ativo
                            @else
                                <i class="fa fa-circle text-danger"></i>   Inativo
                            @endif
                        </p>

					<p class="text-muted text-center">
                    @if($pet->Type==0)
                        Cão
                    @else
                        Gato
                    @endif
                    </p>

					<a href="{!! route('manager.adoptions.edit', ['id'=>$pet->Id])  !!}" class="btn btn-primary btn-block">
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
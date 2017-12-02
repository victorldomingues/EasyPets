@extends('layouts.store') @section('content')
<section class="row">
	<section class="content-header">
		<h1>
			Adoção
			<small>Animais disponíveis para adoção</small>
		</h1>
		<ol class="breadcrumb">
			<li>
				<a href="{{asset('')}}">
					<i class="fa fa-shopping-bag"></i> Página Inicial</a>
			</li>
			<li class="active">Adoção</li>
		</ol>
		<hr>
	</section>

</section>

<section class="row">
	@foreach($pets as $pet)
	<div class="col-md-3">
		<div class="pet-single box box-solid">
			<div class="widget-user-header">
				<img @isset($pet->Image) src="{{asset('')}}uploads/pets/{{$pet->Image}}" @endisset" @empty($pet->Image) @if($pet->Type == 0) src="{{asset('')}}template/dist/img/default-dog.jpg"
				@else src="{{asset('')}}template/dist/img/default-cat.jpg" @endif @endempty style="width:100%"/>
			</div>
			<div class="box-header with-border">
				<h3 class="box-title" style="padding-right:60px; height:40px"> {{$pet->Name}} </h3>


				<div class="box-tools">
					<button class="btn btn-box-tool add-to-cart" pet="{{$pet->Id}}" type="button">
						<i class="fa fa-heart "></i> Adotar
					</button>
				</div>

			</div>
			<div class="box-body no-padding">
				<ul class="nav nav-pills nav-stacked">
					<li>
						<a href="#">
							<i class=" fa fa-tag "></i> @if($pet->Type == 0) Cão @else Gato @endif </a>
					</li>
					<li>
						<a href="#">
							<i class=" fa fa-paw"></i> {{$pet->Race}} </a>
					</li>
					<li>
						<a href="#">
							<i class=" fa fa-calendar "></i> {{$pet->Age}} @if($pet->Age > 1) Anos @else Ano @endif </a>
					</li>
					<li style="text-align: right" pet="{{$pet->Id}}">

						<a style="text-align:center " href="#">
							<i class="fa fa-heart"> </i> Adotar
						</a>
					</li>
				</ul>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	@endforeach

</section>
@endsection
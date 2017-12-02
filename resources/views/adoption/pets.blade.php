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
		@include('adoption.components.pets-card')
	</div>
	@endforeach

</section>
@endsection
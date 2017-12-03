<div class="pet-single box box-solid">
	<div class="widget-user-header">
		@if(isset($images) && count($images) > 0)
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				@foreach($images as $image)
				<li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration}}" @if($loop->iteration == 1) class="active" @endif ></li>
				@endforeach
			</ol>
			<div class="carousel-inner">
				@foreach($images as $image)
				<div class="item  @if($loop->iteration == 1)  active @endif">
					<img style="width:100%;" src="{{asset('')}}uploads/pets/{{$image->ServerName}}">
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


		<img @isset($pet->Image) src="{{asset('')}}uploads/pets/{{$pet->Image}}" @endisset" @empty($pet->Image) @if($pet->Type == 0) src="{{asset('')}}template/dist/img/default-dog.jpg"
		@else src="{{asset('')}}template/dist/img/default-cat.jpg" @endif @endempty style="width:100%"/> @endif
	</div>

	<div class="box-header with-border">
		<h3 class="box-title" style="padding-right:60px; height:40px"> {{$pet->Name}} </h3>


		<div class="box-tools">
			<a href="{!! route('adoption.form', ['id'=>$pet->Id])  !!}" class="btn btn-box-tool add-to-cart" pet="{{$pet->Id}}" >
				<i class="fa fa-heart "></i> Adotar
			</a>
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

				<a style="text-align:center " href="{!! route('adoption.form', ['id'=>$pet->Id])  !!}">
					<i class="fa fa-heart"> </i> Adotar
				</a>
			</li>
		</ul>
	</div>
	<!-- /.box-body -->
</div>
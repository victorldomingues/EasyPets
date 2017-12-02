@extends('layouts.app') @section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Produtos
		<small>Produtos da loja</small>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="{{route('manager')}}">
				<i class="fa fa-shopping-bag "></i> Visão Geral</a>
		</li>
		<li>
			<a href="{{route('manager.products')}}">
				Produtos </a>
		</li>
		<li class="active">Novo produto</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

	<!-- Small boxes (Stat box) -->
	<div class="row">

		<!-- left column -->
		<div class="col-md-8">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cadastro de produto</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" @isset($product) action="{!! route('manager.products.update', ['id'=>$product->Id])  !!}"
				 @endisset @empty($product) action="{{route('manager.products.store')}}" @endempty enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="box-body">

						<div class="row">

							<div class="col-md-4">

								<div class="form-group">
									<label for="">Nova imagem</label>
									<input type="file" id="file" name="file">

									<p class="help-block">clique para adicionar uma nova imagem</p>
								</div>
								@if(isset($images) && count($images) > 0)
								<div class="form-group">

									<label for="">Imagens</label>
									<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											@foreach($images as $image)
											<li data-target="#carousel-example-generic" data-slide-to="{{$loop->iteration}}" class=" circle-image circle-image-{{$image->Id}} @if($loop->iteration == 1) active @endif  "></li>
											@endforeach
										</ol>
										<div class="carousel-inner">
											@foreach($images as $image )
											<div class="item element-image element-image-{{$image->Id}}  @if($loop->iteration == 1)  active @endif">

												<img src="{{asset('')}}uploads/products/{{$image->ServerName}}">

												<div class="carousel-caption">
													<button type="button" e-id="{{$image->Id}}" class="btn btn-small btn-danger remove-image">
														<em class=" fa fa-trash-o"></em>
														<div style="display:  none" class="spin">
															<em class="fa fa-refresh fa-spin" style="color:#fff; font-size:14px"></em>
														</div>
													</button>
												</div>
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


								</div>
								@else 
									<div class="form-group">
											<img  style="width:100%;"

											src="{{asset('')}}template/dist/img/default-product.jpg"
											>
									</div>
								@endif

							</div>

							<div class="col-md-8">

								<div class="form-group">
									<label for="">Nome do produto</label>
									<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)" @isset($product) value="{{$product->Name}}"
									 @endisset required>
								</div>

								<div class="row">
									<div class="col-xs-6">
										<div class="form-group">
											<label for="">Preço</label>
											<input type="text" class="form-control" id="unitprice" name="unitprice" placeholder="(Obrigatório)" @isset($product) value="{{$product->UnitPrice}}"
											 @endisset required>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="form-group">
											<label for="">Fornecedor</label>
											<div class="input-group">
												<div class="input-group-btn">
													<a href="{{route('manager.providers.new')}}" target="_blank" type="button" class="btn btn-default">
														<i class="fa fa-plus"></i>
													</a>
												</div>
												<select class="form-control select2" id="providerid" name="providerid" style="width: 100%;" @isset($product) value="{{$product->ProviderId}}"
												 @endisset required>
													{{--
													<option> (Obrigatório) </option> --}} @foreach ($providers as $provider)
													<option value="{{$provider->Id}}" @isset($product) @if($product->ProviderId == $provider->Id) selected="selected" @endif @endisset> {{ $provider->Name }}
													</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>

								<div class="row">

									<div class="col-xs-4">
										<div class="form-group">
											<label for="">Categoria</label>
											<div class="input-group">

												<div class="input-group-btn">
													<a href="{{route('manager.categories.new')}}" target="_blank" type="button" class="btn btn-default">
														<i class="fa fa-plus"></i>
													</a>
												</div>
												<select class="form-control select2" id="productcategoryid" name="productcategoryid" style="width: 100%;" @isset($product)
												 value="{{$product->ProductCategoryId}}" @endisset required>
													{{--
													<option> (Obrigatório) </option> --}} @foreach ($categories as $category)
													<option value="{{$category->Id}}" @isset($product) @if($product->ProductCategoryId == $category->Id) selected="selected" @endif @endisset>{{$category->Name}}</option>
													@endforeach
												</select>
											</div>

										</div>
									</div>

									<div class="col-xs-4">
										<div class="form-group">
											<label for="">Modelo</label>
											<div class="input-group">
												<div class="input-group-btn">
													<a href="{{route('manager.models.new')}}" target="_blank" type="button" class="btn btn-default">
														<i class="fa fa-plus"></i>
													</a>
												</div>
												<select class="form-control select2" id="productmodelid" name="productmodelid" style="width: 100%;" @isset($product) value="{{$product->ProductModelId}}"
												 @endisset required>
													{{--
													<option> (Obrigatório) </option> --}} @foreach ($models as $model)
													<option value="{{$model->Id}}" @isset($product) @if($product->ProductModelId == $model->Id) selected="selected" @endif @endisset>{{$model->Name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>


									<div class="col-xs-4">
										<div class="form-group">
											<label for="">Cor</label>
											<div class="input-group">
												<div class="input-group-btn">
													<a href="{{route('manager.colors.new')}}" target="_blank" type="button" class="btn btn-default">
														<i class="fa fa-plus"></i>
													</a>
												</div>
												<select class="form-control select2" id="productcolorid" name="productcolorid" style="width: 100%;" @isset($product) value="{{$product->ProductCategoryId}}"
												 @endisset required>
													{{--
													<option> (Obrigatório) </option> --}} @foreach ($colors as $color)
													<option value="{{$color->Id}}" @isset($product) @if($product->ProductColorId == $color->Id) selected="selected" @endif @endisset>{{$color->Name}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>

								</div>

								<div class="form-group">
									<label for="">Descrição</label>
									<textarea type="text" class="form-control" id="description" name="description" placeholder="(Opcional)" @isset($product)
									 value="{{$product->Description}}" @endisset></textarea>
								</div>

								<!-- radio -->
								<div class="form-group">
									<label>
										<input type="radio" name="status" class="flat-red" value="1" @empty($product) checked @endempty @isset($product) @if($product->Status == 1) checked @endif @endisset > Ativo
									</label>
									<label>
										<input type="radio" name="status" class="flat-red" value="0" @isset($product) @if($product->Status == 0) checked @endif @endisset > Inativo
									</label>
								</div>

							</div>

						</div>


					</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>
						@isset($product)
						<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger"> Remover </button>
						@endisset
					</div>



				</form>
			</div>
			<!-- /.box -->

		</div>

	</div>
	<!-- /.row -->
</section>

@isset($product)
<div class="modal modal-danger fade" id="modal-danger">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="POST" action="{!! route('manager.products.destroy', ['id'=>$product->Id])  !!}">
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Atenção !!!</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente remover o produto " {{ $product->Name }} "</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-outline">Remover</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->


@endisset @endsection @section('scripts')
<!-- Page script -->
<script>
	$(function () {
    
    $('.select2').select2()

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red product scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red product scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

	$('body').on('click', '.remove-image', function(e){
		e.preventDefault();

		var t =  $(this);
		var id  =  t.attr("e-id");

		$(".remove-image .fa-trash-o").attr("style", "display: none");

		$(".remove-image .spin").attr("style", "");

		$.get("{{asset('')}}api/manager/products/removeimage/" + id, function( data ) {

			$(".remove-image .spin ").attr("style", "display: none");

			$(".remove-image .fa-trash-o ").attr("style", "");

			$('.element-image-' + id).remove();
			$('.circle-image-' + id).remove();

			$(".circle-image").each(function(a , e) {
				if(a == 0){
					$(e).addClass('active');
					return;
				}
			});
			$(".element-image").each(function(a , e) {
				if(a == 0){
					$(e).addClass('active');
					return;
				}
			});

		});
		
	});

   
  })

</script>

@endsection
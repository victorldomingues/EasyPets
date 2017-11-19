@extends('layouts.app') 

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Categorias
		<small>Categorias para produto</small>
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
		<li class="active">Nova categoria</li>
	</ol>
</section>
<!-- Main content -->
<section class="content">
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Cadastro de categoria</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<form role="form" method="POST" @isset($category) action="{!! route('manager.categories.update', ['id'=>$category->Id])  !!}" @endisset
				 @empty($category) action="{{route('manager.categories.store')}}" @endempty>
					{{ csrf_field() }}
					<div class="box-body">
						

						<div class="form-group">
							<label for="exampleInputEmail1">Nome da categoria</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="(Obrigatório)" @isset($category) value="{{$category->Name}}"
							 @endisset required>
						</div>

						<div class="form-group">
							<label for="exampleInputEmail1">Descrição</label>
							<input type="text" class="form-control" id="description" name="description" placeholder="(Opcional)" @isset($category) value="{{$category->Description}}"
							 @endisset>
						</div>

						<!-- radio -->
						<div class="form-group">
							<label>
								<input type="radio" name="status" class="flat-red" value="1"  @empty($category) checked @endempty @isset($category) @if($category->Status == 1) checked @endif  @endisset > Ativo
							</label>
							<label>
								<input type="radio" name="status" class="flat-red" value="0"  @isset($category) @if($category->Status == 0) checked @endif  @endisset > Inativo
							</label>
						</div>


					</div>

					<!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Salvar</button>
						@isset($category)
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
@isset($category)
<div class="modal modal-danger fade" id="modal-danger">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" method="POST" action="{!! route('manager.categories.destroy', ['id'=>$category->Id])  !!}">
				{{ csrf_field() }}
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Atenção !!!</h4>
				</div>
				<div class="modal-body">
					<p>Deseja realmente remover a categoria " {{ $category->Name }} "</p>
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


@endisset 

@endsection

@section('scripts')
<!-- Page script -->
<script>
  $(function () {
    
   

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red category scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red category scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

   
  })
</script>

@endsection
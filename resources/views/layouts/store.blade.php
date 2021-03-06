<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'EasyPets') }}</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{asset('')}}template/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{asset('')}}template/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="{{asset('')}}template/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('')}}template/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="{{asset('')}}template/build/css/products.css">
	<link rel="stylesheet" href="{{asset('')}}template/build/css/carousel.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="{{asset('')}}template/dist/css/skins/_all-skins.min.css">
	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" href="{{asset('')}}template/plugins/iCheck/all.css">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<header class="main-header">
			<nav class="navbar navbar-static-top">
				<div class="container">
					<div class="navbar-header">
						<a href="{{asset('')}}" class="navbar-brand">
							<em class="fa fa-shopping-bag"> </em>
							<b>Easy</b>Pets </a>
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
							<i class="fa fa-bars"></i>
						</button>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
						<ul class="nav navbar-nav">
							<li class="{{ Request::is('/') ? 'active' : null }}">
								<a href="{{asset('')}}">Página inicial
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="{{ App\Helpers\ActiveLink::isActiveRoute('products') }}">

								<a href="{{route('products')}}">Produtos
									<span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="{{ App\Helpers\ActiveLink::isActiveRoute('services') }}">
								<a href="{{route('services')}}">Serviços </a>
							</li>
							<li class="{{ App\Helpers\ActiveLink::isActiveRoute('adoption') }}">
								<a href="{{route('adoption')}}">Adoção
									<em class="fa fa-paw"></em>
									<span class="sr-only">(current)</span>
								</a>
							</li>

						</ul>
						<form class="navbar-form navbar-left" role="search">
							<div class="form-group">
								<input type="text" class="form-control" id="navbar-search-input" placeholder="Busca">
							</div>
						</form>
					</div>
					<!-- /.navbar-collapse -->
					<!-- Navbar Right Menu -->
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">

							@component('shared.header.cart') @endcomponent @guest
							<li>
								<a href="{{ route('login') }}">Login
									<span class="sr-only">(current)</span>
								</a>
							</li>

							<li>
								<a href="{{ route('register') }}">Cadastrar
									<span class="sr-only">(current)</span>
								</a>
							</li>

							@else @component('shared.header.profile') @endcomponent @endguest
						</ul>
					</div>
					<!-- /.navbar-custom-menu -->
				</div>
				<!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Full Width Column -->
		<div class="content-wrapper">
			<div class="container">
				@yield('content')
			</div>
			<!-- /.container -->
		</div>
		<!-- /.content-wrapper -->
		<footer class="main-footer">
			<div class="container">
				@component('shared.footer.footer') @endcomponent
			</div>
			<!-- /.container -->
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- jQuery 3 -->
	<script src="{{asset('')}}template/bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{asset('')}}template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- SlimScroll -->
	<script src="{{asset('')}}template/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<!-- FastClick -->
	<script src="{{asset('')}}template/bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('')}}template/dist/js/adminlte.min.js"></script>

	<!-- iCheck 1.0.1 -->
	<script src="{{asset('')}}template/plugins/iCheck/icheck.min.js"></script>
	<!-- Form Validator Lib -->
	<script src="{{asset('')}}js/forms/validator.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="{{asset('')}}template/dist/js/demo.js"></script>
	<script src="{{asset('')}}store/cart/js/cart.js"></script>
	@yield('scripts') {{ csrf_field() }}
</body>

</html>
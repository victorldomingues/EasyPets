<!-- User Account Menu -->
<li class="dropdown user user-menu">
	<!-- Menu Toggle Button -->
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<!-- The user image in the navbar-->
		<img src="{{asset('')}}template/dist/img/default-user.png" class="user-image" alt="User Image">
		<!-- hidden-xs hides the username on small devices so only the image appears. -->
		<span class="hidden-xs">{{ Auth::user()->name }} </span>
	</a>
	<ul class="dropdown-menu">
		<!-- The user image in the menu -->
		<li class="user-header">
			<img src="{{asset('')}}template/dist/img/default-user.png" class="img-circle" alt="User Image">

			<p>
				{{ Auth::user()->name }}
				<small>
				@if(Auth::user()->Type  == 0)
				Funcionário
				@else
				Cliente
				@endif
				</small>
			</p>
		</li>
		<!-- Menu Body -->
		<li class="user-body">
			<div class="row">
				<div class="col-xs-4 text-center">
					<a href="{{route('home')}}">Loja</a>
				</div>
				<div class="col-xs-4 text-center">
					<a href="{{route('cart')}}">Carrinho</a>
				</div>
				<div class="col-xs-4 text-center">
					<a href="{{route('manager.orders')}}">Compras</a>
				</div>

			</div>
			<!-- /.row -->
		</li>
		<!-- Menu Footer-->
		<li class="user-footer">
			<div class="pull-left">
				<a href="{{route('manager')}}" class="btn btn-default btn-flat">Minha conta</a>
			</div>
			<div class="pull-right">
				<a href="{{ route('logout') }}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sair</a>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					{{ csrf_field() }}
				</form>
			</div>
		</li>
	</ul>
</li>
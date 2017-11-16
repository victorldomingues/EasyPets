<!-- User Account Menu -->
<li class="dropdown user user-menu">
    <!-- Menu Toggle Button -->
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <!-- The user image in the navbar-->
        <img src="{{asset('')}}template/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
        <!-- hidden-xs hides the username on small devices so only the image appears. -->
        <span class="hidden-xs">{{ Auth::user()->name }} </span>
    </a>
    <ul class="dropdown-menu">
        <!-- The user image in the menu -->
        <li class="user-header">
            <img src="{{asset('')}}template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
                {{ Auth::user()->name }} 
                <small>Cliente</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="{{asset('')}}">Loja</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="">Carrinho</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="">Pedidos</a>
                </div>

            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="{{route('home')}}" class="btn btn-default btn-flat">Minha conta</a>
            </div>
            <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
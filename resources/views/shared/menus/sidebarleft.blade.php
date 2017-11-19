<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('')}}template/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p> {{ Auth::user()->name }} </p>
                <a href="#">
                    <i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Busca...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVEGAÇÃO PRINCIPAL</li>

            <li class="active">
                <a href="{{route('manager')}}">
                    <i class="fa fa-shopping-bag text-aqua"></i>
                    <span>Visão Geral</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-basket"></i>
                    <span> Compras </span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="index.html">
                            <i class="fa fa-circle-o"></i> Visão Geral</a>
                    </li>
                    <li>
                        <a href="index.html">
                            <i class="fa fa-circle-o"></i> Minhas compras </a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text"></i>
                    <span>Ordens</span>
                    <!-- <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span> -->
                    <span class="pull-right-container">
                        <span class="label label-info pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="index.html">
                            <i class="fa fa-circle-o"></i> Visão Geral</a>
                    </li>
                    <li>
                        <a href="index.html">
                            <i class="fa fa-circle-o"></i> Ordens</a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cubes"></i>
                    <span>Estoque</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="index.html">
                            <i class="fa fa-circle-o"></i> Visão Geral</a>
                    </li>
                    <li>
                        <a href="{{route('manager.products')}}">
                            <i class="fa fa-circle-o"></i> Produtos</a>
                    </li>
                    <li>
                        <a href="{{route('manager.categories')}}">
                            <i class="fa fa-circle-o"></i> Categorias</a>
                    </li>
                    <li>
                        <a href="{{route('manager.colors')}}">
                            <i class="fa fa-circle-o"></i> Cores</a>
                    </li>
                    <li>
                        <a href="{{route('manager.models')}}">
                            <i class="fa fa-circle-o"></i> Modelos</a>
                    </li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-paw"></i>
                    <span>Adoções</span>
                    <span class="pull-right-container">
                        <span class="label label-warning pull-right">4</span>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="index.html">
                            <i class="fa fa-circle-o"></i> Visão Geral</a>
                    </li>
                    <li>
                        <a href="{{route('manager.adoptions')}}">
                            <i class="fa fa-circle-o"></i> Adoções</a>
                    </li>
                    <li>
                        <a href="{{route('manager.pets')}}">
                            <i class="fa fa-circle-o"></i> Pets</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{route('manager.custumers')}}">
                    <i class="fa fa-address-card text-green"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fa fa-address-book text-yellow"></i>
                    <span>Funcionários</span>
                </a>
            </li>

            <li>
                <a href="{{route('manager.providers')}}">
                    <i class="fa fa-id-card-o text-blue"></i>
                    <span>Fornecedores</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
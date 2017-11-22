<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu {{ App\Helpers\ActiveLink::isActiveRoute('cart') }}">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-shopping-cart "></i>
        <span class="label label-warning">10</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">Você tem 10 intens no carrinho</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart text-aqua"></i>Produto 0001
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart text-aqua"></i> Produto 0002
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart text-aqua"></i> 5Produto 0003
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart text-aqua"></i> Produto 0004
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-shopping-cart text-aqua"></i> Produto 0005
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer">
            <a href="{{route('cart')}}">Ver todos</a>
        </li>
    </ul>
</li>
<!-- Notifications: style can be found in dropdown.less -->
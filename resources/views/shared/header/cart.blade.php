<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu {{ App\Helpers\ActiveLink::isActiveRoute('cart') }}">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-shopping-cart "></i>
        <span class="label label-warning cart-counter ">0</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">Você tem <span class="cart-counter">0</span> itens no carrinho</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul id="cart-list" class="menu">
               
            </ul>
        </li>
        <li class="footer">
            <a href="{{route('cart')}}">Ver todos</a>
        </li>
    </ul>
</li>
<!-- Notifications: style can be found in dropdown.less -->
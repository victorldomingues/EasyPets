@extends('layouts.store')

@section('content')

<section class="cart row">

    <section class="content-header">
      <h1>
        Carrinho
        <small>de Compras</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="fa fa-shopping-bag"></i> Página Inicial</a></li>
        <li class="active">Carrinho</li>
      </ol>
      <hr>
    </section>

    <div class="form">

        @component('checkout.components.itemsTable')
        @endcomponent

        <a class="btn btn-success checkout" href="checkoutSucesso.jsp" role="button">Finalizar compra</a> <span class="cart-price pull-right">Total: R$ 100,00 </span>
        
    </div>


</section>

<section class="products row">

    <section class="content-header">
      <h1>
        Compre
        <small>Também</small>
      </h1>
    </section>

    <div class="item col-md-3 col-xs-6">
        @component('products.components.card')
        @endcomponent
    </div>

    <div class="item col-md-3 col-xs-6">
        @component('products.components.card')
        @endcomponent
    </div>
    <div class="item col-md-3 col-xs-6">
        @component('products.components.card')
        @endcomponent
    </div>

    <div class="item col-md-3 col-xs-6">
        @component('products.components.card')
        @endcomponent
    </div>

</section>



@endsection
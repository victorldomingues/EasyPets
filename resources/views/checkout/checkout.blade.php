@extends('layouts.store')

@section('content')

<section class="cart row">

    <section class="content-header">
      <h1>
        Checkout
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="fa fa-shopping-bag"></i> Página Inicial</a></li>
        <li class="active">Checkout</li>
      </ol>
      <hr>
    </section>

    <div class="form">

        @component('checkout.components.userDataForm')
        @endcomponent
        
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
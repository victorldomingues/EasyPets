@extends('layouts.store')

@section('content')
<section class="row">

    
    <section class="content-header">
      <h1>
        Produtos
        <small>Todos os produtos</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="fa fa-shopping-bag"></i> Página Inicial</a></li>
        <li class="active">Produtos</li>
      </ol>
      <hr>
    </section>
    
</section>

<section class="row">

    <div class="col-md-12">
        @component('products.components.promotions')
        @endcomponent
    </div>

</section>

<section class="row">

    <div class="col-md-3">
        @component('products.components.card')
        @endcomponent
    </div>

    <div class="col-md-3">
        @component('products.components.card')
        @endcomponent
    </div>
    <div class="col-md-3">
        @component('products.components.card')
        @endcomponent
    </div>

    <div class="col-md-3">
        @component('products.components.card')
        @endcomponent
    </div>
   
</section>
@endsection
@extends('layouts.store')

@section('content')

<section class="products row">

    <section class="content-header">
      <h1>
        Serviços
        <small>Disponíveis</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{asset('')}}"><i class="fa fa-shopping-bag"></i> Página Inicial</a></li>
        <li class="active">Serviços</li>
      </ol>
      <hr>
    </section>

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
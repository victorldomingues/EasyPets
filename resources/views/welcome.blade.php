@extends('layouts.store') 

@section('content')

<section class="row">

    
    <section class="content-header">
      <h1>
        Página Inicial
        <small>Produtos e serviços</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-shopping-bag"></i> Página Inicial</a></li>
        <!-- <li class="active">Dashboard</li> -->
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

    <section class="content-header">
        <h3>
            Produtos
            <small>Mais vendidos</small>
        </h3>

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
   

   <div class="row">
    <div class="col-md-12">

            <section class="content-header" style="margin-top: -30px; padding-top:0px">
        
                <h3> <small class="pull-right"> <a href="#" > Ver todos </a> </small> </h3> 
              
            </section>

        </div>
   </div>

</section>

<section class="row">

    <section class="content-header">
        <h3>
            Serviços
            <small> Mais contrados </small>
        </h3>
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


   <div class="row">
        <div class="col-md-12">

            <section class="content-header" style="margin-top: -30px; padding-top:0px">

                   <h3> <small class="pull-right"> <a href="#" > Ver todos </a> </small> </h3> 
                
            </section>

        </div>
   </div>

</section>


@endsection
@extends('layouts.store') 

@section('content')

<section class="row">

    <div class="col-md-12">
        @component('products.components.banner')
        @endcomponent
    </div>

</section>

<section class="products row">

    <section class="content-header">
        <h3>
            Produtos
            <small>Mais vendidos</small>
        </h3>

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
   

   <div class="row">
    <div class="col-md-12">

            <section class="content-header" style="margin-top: -30px; padding-top:0px">
        
                <h3> <small class="pull-right"> <a href="/produtos" > Ver todos </a> </small> </h3> 
              
            </section>

        </div>
   </div>

</section>

<section class="products container">

    <section class="content-header">
        <h3>
            Serviços
            <small> Mais contrados </small>
        </h3>
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

    <div class="row">
        <div class="col-md-12">

            <section class="content-header" style="margin-top: -30px; padding-top:0px">

                <h3> <small class="pull-right"> <a href="/servicos" > Ver todos </a> </small> </h3> 
                
            </section>

        </div>
   </div>

</section>


@endsection
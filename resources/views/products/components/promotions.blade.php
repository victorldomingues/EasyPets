
      <!-- START ACCORDION & CAROUSEL-->


<div class="row">

<!-- /.col -->
    <div class="col-md-6">

            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                    <img src="{{asset('')}}template/dist/img/photo1.png" alt="First slide">

                    <div class="carousel-caption">
                        Comprar <button type="button" class="btn btn-small btn-info"> <em class="fa fa-shopping-cart"></em> </button>
                    </div>
                    </div>
                    <div class="item">
                    <img src="{{asset('')}}template/dist/img/photo2.png" alt="Second slide">

                    <div class="carousel-caption">
                    Comprar <button type="button" class="btn btn-small btn-info"> <em class="fa fa-shopping-cart"></em> </button>
                    </div>
                    </div>
                    <div class="item">
                    <img src="{{asset('')}}template/dist/img/photo1.png" alt="Third slide">

                    <div class="carousel-caption">
                        Comprar <button type="button" class="btn btn-small btn-info"> <em class="fa fa-shopping-cart"></em> </button>
                    </div>
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>

    </div>

    <div class="col-md-3">
        @component('products.components.card')
        @endcomponent
    </div>

    <div class="col-md-3">
        @component('products.components.card')
        @endcomponent
    </div>

</div>

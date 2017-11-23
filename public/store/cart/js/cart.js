$(function() {
  var Cart = {
    Add: function(e) {
      e.preventDefault();
      var element = $(this);
      var token = $("body input[name='_token'").val();
      var productId = element.attr("product");
      element.addClass("busy");
      $.post(
        "/cart/storeitem",
        {
          productid: productId,
          _token: token
        },
        function(data) {
          console.log(data);
          Cart.RefreshCart();
          element.removeClass("busy");
        }
      );
    },
    RefreshCart: function() {
      var cart = $("#cart-list");
      cart.empty();
      var cartCounter = $(".cart-counter");
      $.get("/cart/items", function(data) {
    
        var sum = data.reduce(function(s, a) {
          return parseInt(s) + parseInt(a.Quantity);
        }, 0);

        var listHtml  = "";
        $.each(data, function(index, item){
            listHtml += '<li> <a href="#"> <i class="fa fa-shopping-cart text-aqua"></i>' + item.Name + ' <label class="label label-info pull-right"> ' + item.Quantity + '</label></a> </li>';
        });
        cart.html(listHtml);
        cartCounter.empty();
        cartCounter.html(sum);
      });
    },
    Init: function() {
      $("body").on("click", ".add-to-cart", Cart.Add);
      Cart.RefreshCart();
    }
  };
  Cart.Init();
});

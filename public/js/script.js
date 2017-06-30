$(document).ready(function() {

    $(".addProd").click(function() {
      var qty = $(this).next().val();
      qty ++;
      $(this).next().val(qty)
    });

    $(".reduceProd").click(function() {
      var qty = $(this).next().next().val();
      if(qty == 0)
      {
        return;
      }
      qty --;
      $(this).next().next().val(qty)
    });

});

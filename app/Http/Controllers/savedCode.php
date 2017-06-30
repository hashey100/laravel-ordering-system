public function getReduceByOne($id) {
     $cart = Session::has('cart') ? Session::get('cart') : null;
     //$cart = new Cart($oldCart);
     $cart->reduceByOne($id);
     if (count($cart->items) > 0) {
         Session::put('cart', $cart);
     } else {
         Session::forget('cart');
     }
     return redirect()->route('product.shoppingCart');
 }

 public function getAddByOne($id) {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->addByOne($id);
      if (count($cart->items) > 0) {
          Session::put('cart', $cart);
      } else {
          Session::forget('cart');
      }
      return redirect()->route('product.shoppingCart');
  }

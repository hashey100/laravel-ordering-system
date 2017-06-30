<?php

namespace App\Http\Controllers;
use App\Cart;
use App\Order;
use App\orders_item;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{

    public function getIndex()
    {
        $user = Auth::user();
        Session::forget('filter');

        if (Auth::check())
        {
          $products =  DB::table('products')->where('tier', $user->tier)->get();
        }
        else {
          $products = Product::all();
        }

        return view('shop.index', ['products' => $products]);
    }


      public function addnew(Request $request)
      {
         $input = Input::only('title','description','price','qty','id');
         $qty = $input['qty'];
         for ($x = 0; $x <= count($qty)-1; $x++) {
          if($input['qty'][$x] == "")
          {
            continue;
          }
          $product = Product::find($input['id'][$x]);
          $oldCart = Session::has('cart') ? Session::get('cart') : null;
          $cart = new Cart($oldCart);
          $cart->add($product, $product->id,$input['qty'][$x]);
          $request->session()->put('cart', $cart);
        }

         if (Session::has('filter')) {
           return redirect()->route('product.filter');
         }
         return redirect()->route('product.index');
      }

      public function updateProd(Request $request)
      {
         $input = Input::only('qty','id');
         $product = Product::find($input['id']);
         $oldCart = Session::has('cart') ? Session::get('cart') : null;
         $cart = new Cart($oldCart);
         $cart->add($product, $product->id,$input['qty']);
         $request->session()->put('cart', $cart);
         return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
      }


    public function getAddToCart(Request $request, $id)
      {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        if (Session::has('filter')) {
          return redirect()->route('product.filter');
        }
        return redirect()->route('product.index');
      }


      public function getRemoveItem($id)
      {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
      }

    public function getCart() {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {

      $unique = substr(str_shuffle(MD5(microtime())), 0, 8);

      if (!Session::has('cart')) {
          return view('shop.shopping-cart');
      }
      $user = Auth::user();
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;

      if (!Auth::check())
      {
        return redirect()->route('user.signin');
      }

      $order = new Order([
          'user_id'=>$user->id
        ]);
          $order->save();

        foreach ($cart->items as $item) {
          $Order_Item = new orders_item([
            'title'=>$item['item']['attributes']['title'],
            'qty'=>$item['qty'],
            'price'=>$item['price'],
            'order_id'=>$order->id
          ]);
            $Order_Item->save();
        }
        Session::forget('cart');
      return view('shop.checkout',['total'=>$total, 'products' => $cart->items]);
    }

    public function remakeOrder($id)
    {
          $user = Auth::user();
          $order = new Order([
                'user_id'=>$user->id
          ]);
          $order->save();
          $Orders = DB::table('orders_items')->where('order_id', $id)->get();
          foreach ($Orders as $item) {
            $Order_Item = new orders_item([
              'title'=>$item->title,
              'qty'=>$item->qty,
              'price'=>$item->price,
              'order_id'=>$order->id
            ]);
              $Order_Item->save();
    }
    return redirect()->route('product.index');
  }

    public function filterProducts()
    {
      $user = Auth::user();

      Session::put('filter', true);
      if (Auth::check())
      {
        $products =  DB::table('products')->where('tier', $user->tier)->orderBy('title')->get();
      }
      else {
        $products = Product::all();
      }
      return view('shop.index', ['products' => $products]);

    }
}
